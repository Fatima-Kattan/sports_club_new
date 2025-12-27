<?php

use App\Http\Controllers\ActivityController;
use App\Http\Controllers\AttendeeController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\FacilityController;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    $coaches = DB::table('employees')
        ->where('role', 'coach')
        ->whereNull('deleted_at') 
        ->get();

    return view('welcome', compact('coaches'));
})->name('welcome');


Route::get('/start', function () {
    return view('startDashboard');
})->name('startDashboard');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// ==================== Employee Routes ==================== //

Route::get('/employees/create', [EmployeeController::class, 'create'])->name('employees.create');
Route::get('/employees', [EmployeeController::class, 'index'])->name('employees.index');
Route::get('/employees/{id}', [EmployeeController::class, 'show'])->name('employees.show');
Route::get('/employees/{id}/edit', [EmployeeController::class, 'edit'])->name('employees.edit');

Route::middleware('auth:sanctum')->group(function () {
    Route::post('/employees', [EmployeeController::class, 'store'])->name('employees.store');
    Route::put('/employees/{id}', [EmployeeController::class, 'update'])->name('employees.update');
    Route::delete('/employees/{id}', [EmployeeController::class, 'destroy'])->name('employees.destroy');
});

Route::get('/employees/role/coaches', [EmployeeController::class, 'coaches'])->name('employees.coaches');
Route::get('/employees/search/results', [EmployeeController::class, 'search'])->name('employees.search');
Route::get('/employees/trashed/all', [EmployeeController::class, 'trashed'])->name('employees.trashed');
Route::post('/employees/{id}/restore', [EmployeeController::class, 'restore'])->name('employees.restore');
Route::delete('/employees/{id}/force-delete', [EmployeeController::class, 'forceDelete'])->name('employees.force-delete');
Route::post('/employees/restore/all', [EmployeeController::class, 'restoreAll'])->name('employees.restore-all');
Route::delete('/employees/trash/empty', [EmployeeController::class, 'emptyTrash'])->name('employees.empty-trash');

// ==================== Category Routes ==================== //

Route::get('/categories/create', [CategoryController::class, 'create'])->name('categories.create');
Route::get('/categories/{category}/edit', [CategoryController::class, 'edit'])->name('categories.edit');

Route::get('/categories', [CategoryController::class, 'index'])->name('categories.index');
Route::get('/categories/{category}', [CategoryController::class, 'show'])->name('categories.show');
Route::post('/categories', [CategoryController::class, 'store'])->name('categories.store');
Route::put('/categories/{category}', [CategoryController::class, 'update'])->name('categories.update');
Route::delete('/categories/{category}', [CategoryController::class, 'destroy'])->name('categories.destroy');

// ==================== Item Routes ==================== //

Route::prefix('categories/{category}')->group(function () {
    Route::get('/items/create', [ItemController::class, 'create'])->name('items.create');
    Route::post('/items', [ItemController::class, 'store'])->name('items.store');
    Route::get('/items/{item}/edit', [ItemController::class, 'edit'])->name('items.edit');
    Route::put('/items/{item}', [ItemController::class, 'update'])->name('items.update');
    Route::delete('/items/{item}', [ItemController::class, 'destroy'])->name('items.destroy');
});

//==================== Facility Routes =================== //

Route::middleware(['auth'])->group(function () {
    Route::get('/facilities', [FacilityController::class, 'index'])->name('facilities.index');
    Route::get('facilities/search', [FacilityController::class, 'search'])->name('facilities.search');
    Route::get('/facilities/create', [FacilityController::class, 'create'])->name('facilities.create');
    Route::post('/facilities', [FacilityController::class, 'store'])->name('facilities.store');
    Route::get('/facilities/{facility}', [FacilityController::class, 'show'])->name('facilities.show');
    Route::get('/facilities/{facility}/edit', [FacilityController::class, 'edit'])->name('facilities.edit');
    Route::put('/facilities/{facility}', [FacilityController::class, 'update'])->name('facilities.update');
    Route::delete('/facilities/{facility}', [FacilityController::class, 'destroy'])->name('facilities.destroy');
});

//==================== Activities Routes =================== //

Route::get('/activities', [ActivityController::class, 'index'])->name('activities.index');
Route::get('/activities/create', [ActivityController::class, 'create'])->name('activities.create');
Route::post('/activities', [ActivityController::class, 'store'])->name('activities.store');
Route::get('/activities/{activity}', [ActivityController::class, 'show'])->name('activities.show');
Route::get('/activities/{activity}/edit', [ActivityController::class, 'edit'])->name('activities.edit');
Route::put('/activities/{activity}', [ActivityController::class, 'update'])->name('activities.update');
Route::delete('/activities/{activity}', [ActivityController::class, 'destroy'])->name('activities.destroy');

//==================== Bookings Routes =================== //

Route::get('/bookings', [BookingController::class, 'index'])->name('bookings.index');
Route::get('/bookings/create', [BookingController::class, 'create'])->name('bookings.create');
Route::post('/bookings', [BookingController::class, 'store'])->name('bookings.store');
Route::get('/bookings/{booking}', [BookingController::class, 'show'])->name('bookings.show');
Route::get('/bookings/{booking}/edit', [BookingController::class, 'edit'])->name('bookings.edit');
Route::put('/bookings/{booking}', [BookingController::class, 'update'])->name('bookings.update');
Route::delete('/bookings/{booking}', [BookingController::class, 'destroy'])->name('bookings.destroy');
Route::middleware(['web'])->group(function () {
    Route::resource('bookings', BookingController::class);
    Route::get('/bookings/get-coaches', [BookingController::class, 'getCoachesByActivity'])
        ->name('bookings.getCoaches');
});

//==================== Attendees Routes =================== //
Route::get('/attendees', [AttendeeController::class, 'index'])->name('attendees.index');
Route::get('/attendees/create', [AttendeeController::class, 'create'])->name('attendees.create');
Route::post('/attendees', [AttendeeController::class, 'store'])->name('attendees.store');
Route::get('/attendees/{attendee}', [AttendeeController::class, 'show'])->name('attendees.show');
Route::get('/attendees/{attendee}/edit', [AttendeeController::class, 'edit'])->name('attendees.edit');
Route::put('/attendees/{attendee}', [AttendeeController::class, 'update'])->name('attendees.update');
Route::delete('/attendees/{attendee}', [AttendeeController::class, 'destroy'])->name('attendees.destroy');

Route::resource('attendees', AttendeeController::class)->except(['show', 'edit', 'update', 'destroy']);
// أو يمكنك تحديد الروابط بشكل منفصل:
Route::get('/attendees/create', [AttendeeController::class, 'create'])->name('attendees.create');
Route::post('/attendees', [AttendeeController::class, 'store'])->name('attendees.store');
Route::get('/attendees/get-bookings/{activity}', [AttendeeController::class, 'getBookingsByActivity'])->name('attendees.get-bookings');
// في routes/web.php
Route::get('/attendees/get-bookings/{activity}', [AttendeeController::class, 'getBookingsByActivity'])->name('attendees.get-bookings');

Route::get('/attendees/get-bookings/{activity}', [AttendeeController::class, 'getBookingsByActivity'])
    ->name('attendees.get-bookings')
    ->where('activity', '[0-9]+'); // لتأكد أن activity هو رقم
// أضف هذا الراوت
Route::get('/attendees/get-bookings/{activity}', [AttendeeController::class, 'getBookingsByActivity'])
    ->name('attendees.get-bookings');
Route::post('/attendees/{attendee}/update-status', [AttendeeController::class, 'updateStatus'])->name('attendees.update-status');
// Route لإنشاء الحضور
Route::get('/attendees/create', [AttendeeController::class, 'create'])->name('attendees.create');
Route::post('/attendees', [AttendeeController::class, 'store'])->name('attendees.store');
Route::get('/attendees/get-activity-users/{activity}', [App\Http\Controllers\AttendeeController::class, 'getActivityUsers']);

Route::post('/attendees/register-attendance', [AttendeeController::class, 'registerAttendance'])->name('attendees.register');

require __DIR__ . '/auth.php';
