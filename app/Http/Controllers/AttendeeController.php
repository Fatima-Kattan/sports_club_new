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
    /**
     * عرض إحصائيات الحضور حسب النشاطات
     */
    public function index()
    {
        $this->authorize('manageAttendee', \App\Models\Attendee::class);
        // جلب إحصائيات الحضور حسب النشاط
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
        // إحصائيات عامة - عدد الأشخاص فقط (بدون عمليات التعديل)
        $totalPresent = Attendee::where('status', true)->distinct('booking_id')->count();
        $totalAbsent = $totalBookings -  $totalPresent;

        // إجمالي عدد الحضور (من جدول attendees فقط) - الأشخاص المختلفين
       /*  $totalAttendees = $totalPresent + $totalAbsent; */

        // إجمالي عدد الحجوزات الكلي (من جدول bookings)


        return view('attendees.index', compact(
            'activities',
            'totalPresent',
            'totalAbsent',
            'totalBookings'
        ));
    }

    public function create()
    {
        $this->authorize('manageAttendee', \App\Models\Attendee::class);
        // جلب جميع الأنشطة لعرضها في dropdown
        $activities = Activity::with(['bookings.user'])->get();

        return view('attendees.create', compact('activities'));
    }

    /**
     * Store a newly created attendee in storage.
     */
    public function store(Request $request)
    {
        $this->authorize('manageAttendee', \App\Models\Attendee::class);
        $validated = $request->validate([
            'booking_id' => 'required|exists:bookings,id',
            'status' => 'required|boolean',
        ]);

        Attendee::create($validated);

        return redirect()->route('attendees.index')
            ->with('success', 'Attendee created successfully.');
    }

    /**
     * AJAX function to get bookings for a specific activity
     */
    // في AttendeeController.php
    public function getBookingsByActivity(Request $request, $activityId = null)
    {
        // إذا لم يتم إرسال activityId، يمكن إرجاع مصفوفة فارغة
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
    // في AttendeeController (أو أي اسم للكونترولر الخاص بك)
    public function getActivityUsers($activityId)
    {
        
        try {
            // 1. تحقق من وجود النشاط
            $activity = Activity::findOrFail($activityId);

            // 2. جلب المستخدمين المسجلين عبر جدول الحجوزات
            // هذا يفترض أن لديك نموذج Booking وعلاقات معرّفة
            $users = User::whereHas('bookings', function ($query) use ($activityId) {
                $query->where('activity_id', $activityId);
            })->get(['id', 'name', 'email', 'phone']); // حدد الأعمدة اللازمة فقط

            // 3. إرجاع البيانات بتنسيق JSON
            return response()->json([
                'success' => true,
                'users' => $users
            ]);
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            // في حال لم يتم إيجاد النشاط
            return response()->json([
                'success' => false,
                'message' => 'النشاط المطلوب غير موجود.'
            ], 404);
        } catch (\Exception $e) {
            // لأي خطأ آخر
            return response()->json([
                'success' => false,
                'message' => 'حدث خطأ في تحميل البيانات: ' . $e->getMessage()
            ], 500);
        }
    }
    /**
     * عرض تفاصيل حضور نشاط معين
     */
    // في الكونترولر (مثل AttendanceController)
    // في AttendeeController أو الكونترولر الخاص بك
    public function registerAttendance(Request $request)
    {
        $request->validate([
            'booking_id' => 'required|exists:bookings,id',
            'status' => 'required|boolean',
            'activity_id' => 'required|exists:activities,id'
        ]);

        // التحقق من عدم وجود تسجيل مسبق لنفس الحجز في نفس اليوم
        $today = now()->format('Y-m-d');
        $existing = Attendee::where('booking_id', $request->booking_id)
            ->whereDate('created_at', $today)
            ->first();

        if ($existing) {
            // إذا كان موجوداً، نحدث الحالة فقط
            $existing->update(['status' => $request->status]);

            return response()->json([
                'success' => true,
                'message' => 'Attendance status updated successfully',
                'action' => 'updated'
            ]);
        }

        // إنشاء سجل حضور جديد
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

        // الحصول على سجلات الحضور لليوم فقط
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

    /**
     * جلب الإحصائيات عبر AJAX
     */
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
