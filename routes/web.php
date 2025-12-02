<?php

use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// ==================== Employee Routes ====================


Route::get('/employees/role/coaches', [EmployeeController::class, 'coaches'])->name('employees.coaches');
Route::get('/employees/search/results', [EmployeeController::class, 'search'])->name('employees.search');


Route::middleware(['auth'])->group(function () {
    
    Route::get('/employees', [EmployeeController::class, 'index'])->name('employees.index');
    Route::get('/employees/{id}', [EmployeeController::class, 'show'])->name('employees.show');
    Route::get('/employees/create', [EmployeeController::class, 'create'])->name('employees.create');
    Route::post('/employees', [EmployeeController::class, 'store'])->name('employees.store');
    Route::get('/employees/{id}/edit', [EmployeeController::class, 'edit'])->name('employees.edit');
    Route::put('/employees/{id}', [EmployeeController::class, 'update'])->name('employees.update');
    Route::delete('/employees/{id}', [EmployeeController::class, 'destroy'])->name('employees.destroy');
    
    
    Route::get('/employees/trashed/all', [EmployeeController::class, 'trashed'])->name('employees.trashed');
    Route::post('/employees/{id}/restore', [EmployeeController::class, 'restore'])->name('employees.restore');
    Route::delete('/employees/{id}/force-delete', [EmployeeController::class, 'forceDelete'])->name('employees.force-delete');
    Route::post('/employees/restore/all', [EmployeeController::class, 'restoreAll'])->name('employees.restore-all');
    Route::delete('/employees/trash/empty', [EmployeeController::class, 'emptyTrash'])->name('employees.empty-trash');
});

require __DIR__.'/auth.php';