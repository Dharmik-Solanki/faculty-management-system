<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\FacultyController; // <-- ADDED THIS IMPORT
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect()->route('login');
});

// <-- ADDED THIS ROUTE FOR THE REGISTRATION FORM -->
Route::post('/faculty/register', [FacultyController::class, 'store'])->name('faculty.store');


Route::middleware(['auth'])->group(function () {

    // The Traffic Cop Route
    Route::get('/dashboard', function () {
        if (auth()->user()->role === 'admin') {
            return redirect()->route('admin.dashboard');
        }
        return redirect()->route('faculty.dashboard');
    })->name('dashboard');

    // Faculty Dashboard
    Route::get('/faculty/dashboard', function () {
        return view('faculty.dashboard');
    })->name('faculty.dashboard');

    // Admin Dashboard
    Route::middleware(['admin'])->group(function () {
        Route::get('/admin/dashboard', [AdminController::class, 'index'])->name('admin.dashboard');
        Route::get('/admin/faculty/{id}', [AdminController::class, 'show'])->name('admin.faculty.show');
        Route::patch('/admin/user/{id}/status', [AdminController::class, 'toggleStatus'])->name('admin.user.status');
        Route::delete('/admin/user/{id}', [AdminController::class, 'destroy'])->name('admin.user.delete');
        Route::get('/admin/faculty/{id}/edit', [AdminController::class, 'edit'])->name('admin.faculty.edit');
        Route::put('/admin/faculty/{id}', [AdminController::class, 'update'])->name('admin.faculty.update');
    });

    // --- ADD THESE 3 LINES FOR THE PROFILE DROPDOWN ---
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
