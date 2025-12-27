<?php

namespace App\Http\Controllers;

use App\Models\Attendee;
use App\Models\Booking;
use App\Models\Activity;
use App\Models\User;
use Illuminate\Http\Request;
use Carbon\Carbon;

class AttendeeController extends Controller
{
    /**
     * عرض إحصائيات الحضور حسب النشاطات
     */
    public function index()
    {
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

    // ... باقي الدوال الأخرى (create, store, show, edit, update, destroy) ...

    /**
     * جلب الإحصائيات عبر AJAX
     */
    /*  public function statistics()
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
    } */
    /**
     * عرض نموذج إنشاء حضور جديد
     */
    //     public function create()
    //     {
    //         $activities = Activity::where('is_active', true)->get();
    //         $today = Carbon::today()->format('Y-m-d');

    //         return view('attendees.create', compact('activities', 'today'));
    //     }

    //     /**
    //      * البحث عن المستخدمين لنشاط معين
    //      */
    //     public function searchUsers(Request $request)
    //     {
    //         // التحقق من صحة البيانات
    //         $validated = $request->validate([
    //             'activity_id' => 'required|integer|exists:activities,id',
    //             'search' => 'required|string|min:2'
    //         ]);

    //         $activityId = $validated['activity_id'];
    //         $searchTerm = $validated['search'];

    //         // البحث عن المستخدمين الذين يمكنهم التسجيل في هذا النشاط
    //         $users = User::where(function ($query) use ($searchTerm) {
    //             $query->where('name', 'LIKE', '%' . $searchTerm . '%')
    //                 ->orWhere('email', 'LIKE', '%' . $searchTerm . '%')
    //                 ->orWhere('phone', 'LIKE', '%' . $searchTerm . '%');
    //         })
    //             // استبعاد المستخدمين الذين سجلوا حضورهم مسبقاً في هذا النشاط
    //             ->whereDoesntHave('attendees', function ($query) use ($activityId) {
    //                 $query->where('activity_id', $activityId);
    //             })
    //             ->select('id', 'name', 'email', 'phone')
    //             ->orderBy('name')
    //             ->limit(15)
    //             ->get();

    //         return response()->json($users);
    //     }

    //     // في routes/web.php

    //     public function getActivityUsers($activityId)
    // {
    //     try {
    //         $activity = \App\Models\Activity::find($activityId);

    //         if (!$activity) {
    //             return response()->json([
    //                 'success' => false,
    //                 'message' => 'النشاط غير موجود',
    //                 'users' => []
    //             ]);
    //         }

    //         // 🔧 الطريقة 1: إذا كان لديك جدول registrations
    //         $users = \App\Models\User::whereHas('registrations', function($query) use ($activityId) {
    //             $query->where('activity_id', $activityId)
    //                   ->where('status', 'active'); // إذا كان لديك حقل حالة
    //         })->get();

    //         // 🔧 أو الطريقة 2: إذا كان لديك علاقة many-to-many مباشرة
    //         // $users = $activity->users()->wherePivot('status', 'active')->get();

    //         // 🔧 الطريقة 3: إذا كان لديك جدول attendances (الحضور)
    //         // $users = \App\Models\User::whereHas('attendances', function($query) use ($activityId) {
    //         //     $query->where('activity_id', $activityId);
    //         // })->get();

    //         // 🔧 الطريقة 4: للاختبار - عرض 5 مستخدمين فقط
    //         // $users = \App\Models\User::limit(5)->get();

    //         $formattedUsers = $users->map(function($user) {
    //             return [
    //                 'id' => $user->id,
    //                 'name' => $user->name ?? 'بدون اسم',
    //                 'email' => $user->email ?? 'بدون بريد',
    //                 'phone' => $user->phone ?? 'بدون هاتف'
    //             ];
    //         });

    //         return response()->json([
    //             'success' => true,
    //             'activity' => [
    //                 'id' => $activity->id,
    //                 'name' => $activity->name
    //             ],
    //             'users' => $formattedUsers,
    //             'count' => $formattedUsers->count(),
    //             'message' => 'تم العثور على ' . $formattedUsers->count() . ' شخص مسجل في النشاط'
    //         ]);

    //     } catch (\Exception $e) {
    //         return response()->json([
    //             'success' => false,
    //             'message' => 'حدث خطأ: ' . $e->getMessage(),
    //             'users' => []
    //         ]);
    //     }
    // }
    //     /**
    //      * إصدار بديل باستخدام POST
    //      */
    //     public function getActivityUsersPost(Request $request)
    //     {
    //         try {
    //             $request->validate([
    //                 'activity_id' => 'required|exists:activities,id'
    //             ]);

    //             // جلب المستخدمين حسب العلاقة
    //             $users = User::whereHas('activities', function($query) use ($request) {
    //                 $query->where('activities.id', $request->activity_id);
    //             })->get(['id', 'name', 'email', 'phone']);

    //             return response()->json([
    //                 'success' => true,
    //                 'users' => $users
    //             ]);

    //         } catch (\Exception $e) {
    //             return response()->json([
    //                 'success' => false,
    //                 'message' => 'حدث خطأ: ' . $e->getMessage()
    //             ], 500);
    //         }
    //     }


    //     /**
    //      * Store a newly created resource in storage.
    //      */
    //     public function store(Request $request)
    //     {
    //         $request->validate([
    //             'user_id' => 'required|exists:bookings,id',
    //             'activity_id' => 'required|exists:activities,id',
    //             'status' => 'boolean'
    //         ]);

    //         // البحث عن الحجز
    //         $booking = Booking::find($request->user_id);

    //         if (!$booking) {
    //             return back()->with('error', 'الحجز غير موجود');
    //         }

    //         // التحقق من أن النشاط صحيح
    //         if ($booking->activity_id != $request->activity_id) {
    //             return back()->with('error', 'العميل ليس لديه حجز في هذا النشاط');
    //         }

    //         // التحقق من عدم وجود حضور سابق
    //         $existingAttendee = Attendee::where('booking_id', $booking->id)->first();
    //         if ($existingAttendee) {
    //             return back()->with('error', 'هذا العميل لديه حضور مسجل مسبقاً');
    //         }

    //         Attendee::create([
    //             'booking_id' => $booking->id,
    //             'status' => $request->status ?? false,
    //             'attendance_count' => $request->status ? 1 : 0
    //         ]);

    //         return redirect()->route('attendees.index')
    //             ->with('success', 'تم تسجيل الحضور بنجاح');
    //     }

    public function create()
    {
        // جلب جميع الأنشطة لعرضها في dropdown
        $activities = Activity::with(['bookings.user'])->get();

        return view('attendees.create', compact('activities'));
    }

    /**
     * Store a newly created attendee in storage.
     */
    public function store(Request $request)
    {
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
     * عرض نموذج تعديل حضور
     */
    public function edit(Attendee $attendee)
    {
        $attendee->load(['booking.user', 'booking.activity']);
        return view('attendees.edit', compact('attendee'));
    }

    /**
     * تحديث بيانات حضور
     */
    public function update(Request $request, Attendee $attendee)
    {
        $validated = $request->validate([
            'status' => 'required|boolean'
        ]);

        $attendee->update($validated);

        return redirect()->route('attendees.show', $attendee->booking->activity_id)
            ->with('success', 'تم تحديث الحضور بنجاح.');
    }


    /**
     * تحديث حالة الحضور عبر AJAX
     */
    // public function updateStatus(Request $request, Attendee $attendee)
    // {
    //     $request->validate([
    //         'status' => 'required|boolean'
    //     ]);

    //     $attendee->update(['status' => $request->status]);

    //     return response()->json([
    //         'success' => true,
    //         'message' => 'تم تحديث الحالة بنجاح',
    //         'status_text' => $attendee->status ? 'حاضر' : 'غائب'
    //     ]);
    // }

    /**
     * حذف حضور
     */
    public function destroy(Attendee $attendee)
    {
        $activityId = $attendee->booking->activity_id;
        $attendee->delete();

        return redirect()->route('attendees.show', $activityId)
            ->with('success', 'تم حذف الحضور بنجاح.');
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
