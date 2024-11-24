<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\GameMatchController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ReservationController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\VenueController;
use Illuminate\Support\Facades\Route;

// Admin Dashboard Route
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');


Route::get('/', function () {
    return redirect()->route('login'); // Redirect to the login page
});




Route::middleware(['auth', 'admin'])->group(function () {
    // Dashboard route for admins
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    // Resource routes for admin management
    Route::resource('users', UserController::class);
    Route::resource('roles', RoleController::class);
    Route::resource('categories', CategoryController::class);
    Route::resource('venues', VenueController::class);
    Route::resource('matches', GameMatchController::class);
    Route::resource('reservations', ReservationController::class);
});

// User Profile Routes
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Auth routes (Breeze handles this)
require __DIR__.'/auth.php';    