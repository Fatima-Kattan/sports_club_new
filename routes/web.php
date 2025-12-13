<?php

use App\Http\Controllers\ActivityController;
use App\Http\Controllers\AttendeeController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
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

// ==================== Employee Routes ====================

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

// ==================== Category Routes ====================

Route::get('/categories/create', [CategoryController::class, 'create'])->name('categories.create');
Route::get('/categories/{category}/edit', [CategoryController::class, 'edit'])->name('categories.edit');

Route::get('/categories', [CategoryController::class, 'index'])->name('categories.index');
Route::get('/categories/{category}', [CategoryController::class, 'show'])->name('categories.show');
Route::get('/categories/search/query', [CategoryController::class, 'searchCategories'])->name('categories.search');


    Route::post('/categories', [CategoryController::class, 'store'])->name('categories.store');
    Route::put('/categories/{category}', [CategoryController::class, 'update'])->name('categories.update');
    Route::delete('/categories/{category}', [CategoryController::class, 'destroy'])->name('categories.destroy');

Route::get('/items', [ItemController::class, 'index'])->name('items.index');
Route::get('/activities', [ActivityController::class, 'index'])->name('activities.index');
Route::get('/bookings', [BookingController::class, 'index'])->name('bookings.index');
Route::get('/attendees', [AttendeeController::class, 'index'])->name('attendees.index');
Route::get('/users', [UserController::class, 'index'])->name('users.index');

require __DIR__.'/auth.php';