<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\ReservationController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\UserProfileController;
use App\Http\Controllers\UserCategoryController;
use App\Http\Controllers\UserMatchController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\VenueInfoController;
use App\Http\Controllers\VenueDescriptionController;

// Venue Info
Route::get('/venues', [VenueInfoController::class, 'index'])->name('venues.index');
Route::get('/venues/{id}', [VenueInfoController::class, 'show'])->name('venues.show');

// Venue Description
Route::get('/venue-descriptions', [VenueDescriptionController::class, 'index'])->name('venue_descriptions.index');
Route::get('/venue-descriptions/{id}', [VenueDescriptionController::class, 'show'])->name('venue_descriptions.show');

// Display the contact form (located in 'home/index.blade.php')
Route::get('user/home/index', [ContactController::class, 'create'])->name('user.home.index');

// Handle the form submission
Route::post('user/home/index', [ContactController::class, 'store'])->name('user.home.index');


// List all categories (not specific to one category)
Route::get('/categories', [UserCategoryController::class, 'index'])->name('user.categories.index');

// Display specific category details
Route::get('/categories/{id}', [UserCategoryController::class, 'show'])->name('categories.show');


Route::prefix('user')->middleware('auth')->group(function () {
    Route::get('/profile', [UserProfileController::class, 'index'])->name('user.profile.index');
    Route::get('/profile/edit', [UserProfileController::class, 'edit'])->name('user.profile.edit');
    Route::put('/profile', [UserProfileController::class, 'update'])->name('user.profile.update');
});

// ------------------------- PUBLIC ROUTES -----------------------------
Route::prefix('auth')->group(function () {
    Route::get('/login', [AuthController::class, 'showLogin'])->name('auth.login');
});

Route::get('/login', [AuthenticatedSessionController::class, 'create'])->name('login');
Route::post('/login', [AuthenticatedSessionController::class, 'store']);
Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])->middleware('auth')->name('logout');

// Redirect the root route to the home page
Route::get('/', function () {
    return redirect()->route('home'); // Default route directs to home
});

// Home Page
Route::get('/home', [HomeController::class, 'index'])->name('home');

// Categories
Route::get('/categories/basketball', [CategoryController::class, 'basketball'])->name('categories.basketball');
Route::get('/categories/football', [CategoryController::class, 'football'])->name('categories.football');
Route::get('/categories/tennis', [CategoryController::class, 'tennis'])->name('categories.tennis');

// Reservations
Route::get('/reservations', [ReservationController::class, 'index'])->name('reservations.index');
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);
// ------------------------- AUTHENTICATION ----------------------------

// Guest routes (Only accessible for unauthenticated users)
Route::middleware('guest')->group(function () {
    Route::get('/login', [AuthenticatedSessionController::class, 'create'])->name('login');
    Route::post('/login', [AuthenticatedSessionController::class, 'store']);
});

// Logout (Accessible by authenticated users only)
Route::middleware('auth')->post('/logout', [AuthenticatedSessionController::class, 'destroy'])->name('logout');

// ------------------------- ADMIN DASHBOARD ---------------------------

// Admin Routes
Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
});

// ---------------------- AUTHENTICATED USERS --------------------------

Route::middleware('auth')->group(function () {
    // User Profile
    Route::get('/profile', [ProfileController::class, 'show'])->name('profile.show');
    Route::get('/profile/edit', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// --------------------- BREEZE AUTH ROUTES ----------------------------

require __DIR__ . '/auth.php';