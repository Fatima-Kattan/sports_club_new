<?php

namespace App\Http\Controllers;

use App\Models\Attendee;
use App\Models\Booking;
use App\Models\Activity;
use App\Models\User;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class AttendeeController extends Controller
{
    use AuthorizesRequests;
    public function index()
    {
        $this->authorize('manageAttendee', Attendee::class);
        // Get attendance statistics by activity
        $activities = Activity::withCount([
            'bookings',
            'bookings as present_count' => function ($query) {
                $query->whereHas('attendee', function ($q) {
                    $q->where('status', true);
                });
            },
            'bookings as absent_count' => function ($query) {
                $query->whereHas('attendee', function ($q) {
                    $q->where('status', false);
                });
            }
        ])->get();
        $totalBookings = Booking::count();
        // General statistics - number of people only (without modifications)
        $totalPresent = Attendee::where('status', true)->distinct('booking_id')->count();
        $totalAbsent = $totalBookings -  $totalPresent;

        return view('attendees.index', compact(
            'activities',
            'totalPresent',
            'totalAbsent',
            'totalBookings'
        ));
    }

    public function create()
    {
        $this->authorize('manageAttendee',Attendee::class);
        // Get all activities to display in dropdown
        $activities = Activity::with(['bookings.user'])->get();

        return view('attendees.create', compact('activities'));
    }

    /**
     * Store a newly created attendee in storage.
     */
    public function store(Request $request)
    {
        $this->authorize('manageAttendee', Attendee::class);
        $validated = $request->validate([
            'booking_id' => 'required|exists:bookings,id',
            'status' => 'required|boolean',
        ]);

        Attendee::create($validated);

        return redirect()->route('attendees.index')
            ->with('success', 'Attendee created successfully.');
    }

    // In AttendeeController.php
    public function getBookingsByActivity(Request $request, $activityId = null)
    {
        // If activityId is not sent, you can return an empty array
        if (!$activityId) {
            return response()->json([]);
        }

        $bookings = Booking::with('user')
            ->where('activity_id', $activityId)
            ->get()
            ->map(function ($booking) {
                return [
                    'id' => $booking->id,
                    'user_name' => $booking->user->name,
                    'user_email' => $booking->user->email,
                ];
            });

        return response()->json($bookings);
    }

    public function getActivityUsers($activityId)
    {

        try {
            // 1. Check if the activity exists
            $activity = Activity::findOrFail($activityId);
            $users = User::whereHas('bookings', function ($query) use ($activityId) {
                $query->where('activity_id', $activityId);
            })->get(['id', 'name', 'email']); // Select only necessary columns

            // 3. Return data in JSON format
            return response()->json([
                'success' => true,
                'users' => $users
            ]);
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            // In case the activity is not found
            return response()->json([
                'success' => false,
                'message' => 'The requested activity does not exist.'
            ], 404);
        } catch (\Exception $e) {
            // For any other error
            return response()->json([
                'success' => false,
                'message' => 'An error occurred while loading data: ' . $e->getMessage()
            ], 500);
        }
    }
    /**
     * Display attendance details for a specific activity
     */
    public function registerAttendance(Request $request)
    {
        $request->validate([
            'booking_id' => 'required|exists:bookings,id',
            'status' => 'required|boolean',
            'activity_id' => 'required|exists:activities,id'
        ]);

        // Check for no previous registration for the same booking on the same day
        $today = now()->format('Y-m-d');
        $existing = Attendee::where('booking_id', $request->booking_id)
            ->whereDate('created_at', $today)
            ->first();

        if ($existing) {
            // If exists, update status only
            $existing->update(['status' => $request->status]);

            return response()->json([
                'success' => true,
                'message' => 'Attendance status updated successfully',
                'action' => 'updated'
            ]);
        }

        // Create new attendance record
        $attendance = Attendee::create([
            'booking_id' => $request->booking_id,
            'status' => $request->status
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Attendance registered successfully',
            'action' => 'created'
        ]);
    }

    public function updateStatus(Request $request, Attendee $attendee)
    {
        $request->validate([
            'status' => 'required|boolean'
        ]);

        try {
            $oldStatus = $attendee->status;
            $newStatus = $request->status;

            $attendee->update([
                'status' => $newStatus
            ]);

            $statusText = $newStatus ? 'Present' : 'Absent';
            $oldStatusText = $oldStatus ? 'Present' : 'Absent';

            return response()->json([
                'success' => true,
                'message' => "Attendance status changed from {$oldStatusText} to {$statusText} successfully!"
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Failed to update attendance status'
            ], 500);
        }
    }

    public function show($activityId)
    {
        $this->authorize('manageAttendee', \App\Models\Attendee::class);
        $activity = Activity::with(['bookings.user'])->findOrFail($activityId);

        // Get attendance records for today only
        $today = now()->format('Y-m-d');
        $attendances = Attendee::whereHas('booking', function ($query) use ($activityId) {
            $query->where('activity_id', $activityId);
        })
            ->with('booking.user')
            ->whereDate('created_at', $today)
            ->get()
            ->groupBy(function ($item) {
                return $item->created_at->format('Y-m-d');
            });

        $presentCount = Attendee::whereHas('booking', function ($query) use ($activityId) {
            $query->where('activity_id', $activityId);
        })
            ->whereDate('created_at', $today)
            ->where('status', 1)
            ->count();

        $absentCount = Attendee::whereHas('booking', function ($query) use ($activityId) {
            $query->where('activity_id', $activityId);
        })
            ->whereDate('created_at', $today)
            ->where('status', 0)
            ->count();

        $notRegisteredCount = $activity->bookings->count() - ($presentCount + $absentCount);

        return view('attendees.show', compact(
            'activity',
            'attendances',
            'presentCount',
            'absentCount',
            'notRegisteredCount'
        ));
    }

    public function statistics()
    {
        $totalPresent = Attendee::where('status', true)->count();
        $totalAbsent = Attendee::where('status', false)->count();
        $totalAttendees = $totalPresent + $totalAbsent;
        $totalBookings = Booking::count();

        return response()->json([
            'totalPresent' => $totalPresent,
            'totalAbsent' => $totalAbsent,
            'totalAttendees' => $totalAttendees,
            'totalBookings' => $totalBookings
        ]);
    }
}