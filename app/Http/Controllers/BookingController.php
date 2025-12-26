<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Employee;
use App\Models\User;
use App\Models\Activity;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;


class BookingController extends Controller
{
    use AuthorizesRequests;
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $this->authorize('manageBooking', \App\Models\Booking::class);
        /*  $query = Booking::query(); */
        $bookings = Booking::with(['user', 'activity', 'employee'])->paginate(10);
        $totalBookings = Booking::count();

        return view('bookings.index', compact('bookings', 'totalBookings'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $this->authorize('manageBooking', \App\Models\Booking::class);
        $users = User::all();
        $activities = Activity::all();
        $employees = Employee::all();
        return view('bookings.create', compact('users', 'activities', 'employees'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->authorize('manageBooking', \App\Models\Booking::class);
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'activity_id' => 'required|exists:activities,id',
            'employee_id' => 'required|exists:employees,id',
            'paid' => 'boolean'
        ]);

        Booking::create([
            'user_id' => $request->user_id,
            'activity_id' => $request->activity_id,
            'employee_id' => $request->employee_id,
            'paid' => $request->has('paid') ? true : false,
        ]);

        return redirect()->route('bookings.index')
            ->with('success', 'تم إنشاء الحجز بنجاح');
    }

    /**
     * Display the specified resource.
     */
    public function show(Booking $booking)
    {
        $this->authorize('manageBooking', \App\Models\Booking::class);
        $booking->load(['user', 'activity', 'employee', 'attendee']);
        return view('bookings.show', compact('booking'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Booking $booking)
    {
        $this->authorize('manageBooking', \App\Models\Booking::class);
        $users = User::all();
        $activities = Activity::all();
        $employees = Employee::all();
        return view('bookings.edit', compact('booking', 'users', 'activities', 'employees'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Booking $booking)
    {
        $this->authorize('manageBooking', \App\Models\Booking::class);
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'activity_id' => 'required|exists:activities,id',
            'employee_id' => 'required|exists:employees,id',
            'paid' => 'boolean'
        ]);

        $booking->update([
            'user_id' => $request->user_id,
            'activity_id' => $request->activity_id,
            'employee_id' => $request->employee_id,
            'paid' => $request->has('paid') ? true : false,
        ]);

        return redirect()->route('bookings.index')
            ->with('success', 'تم تحديث الحجز بنجاح');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Booking $booking)
    {
        $this->authorize('manageBooking', \App\Models\Booking::class);
        $booking->delete();
        return redirect()->route('bookings.index')
            ->with('success', 'تم حذف الحجز بنجاح');
    }

    /**
     * دالة جديدة لجلب الكوتشات بناءً على النشاط
     */
    public function getCoachesByActivity(Request $request)
    {
        $this->authorize('manageBooking', \App\Models\Booking::class);
        $request->validate([
            'activity_id' => 'required|exists:activities,id'
        ]);

        // الحصول على النشاط المحدد
        $activity = Activity::findOrFail($request->activity_id);

        // جلب جميع الموظفين أولاً
        $allEmployees = Employee::all();

        // تصفية الموظفين بناءً على تطابق الـ Position مع النشاط
        $matchedCoaches = $allEmployees->filter(function ($employee) use ($activity) {
            $position = strtolower($employee->position);
            $activityName = strtolower($activity->name);

            // تحويل النصوص إلى كلمات
            $positionWords = preg_split('/\s+/', $position);
            $activityWords = preg_split('/\s+/', $activityName);

            // البحث عن أي تطابق بين الكلمات
            foreach ($activityWords as $activityWord) {
                foreach ($positionWords as $positionWord) {
                    // إذا كانت الكلمة طويلة بما يكفي وتتطابق جزئياً
                    if (
                        strlen($activityWord) > 3 &&
                        (str_contains($positionWord, $activityWord) ||
                            str_contains($activityWord, $positionWord))
                    ) {
                        return true;
                    }
                }
            }

            return false;
        });

        // إذا لم يتم العثور على تطابقات، ارجع جميع الكوتشات
        if ($matchedCoaches->isEmpty()) {
            $matchedCoaches = $allEmployees;
        }

        return response()->json($matchedCoaches->values());
    }
}
