<?php
    use App\Http\Controllers\AdminVenueDescriptionController;
    use App\Http\Controllers\AdminVenueInfoController;
    use Illuminate\Support\Facades\Route;
    use App\Http\Controllers\AuthController;
    use App\Http\Controllers\HomeController;
    use App\Http\Controllers\ContactController;
    use App\Http\Controllers\ProfileController;
    use App\Http\Controllers\CategoryController;
    use App\Http\Controllers\DashboardController;
    use App\Http\Controllers\UserMatchController;
    use App\Http\Controllers\UserVenueController;
    use App\Http\Controllers\VenueInfoController;
    use App\Http\Controllers\Auth\LoginController;
    use App\Http\Controllers\ReservationController;
    use App\Http\Controllers\UserProfileController;
    use App\Http\Controllers\UserCategoryController;
    use App\Http\Controllers\UserReservationController;
    use App\Http\Controllers\VenueDescriptionController;
    use App\Http\Controllers\Auth\AuthenticatedSessionController;
    use App\Http\Controllers\GameMatchController;
    use App\Http\Controllers\NewsletterController;



    

                    // routes/web.php
        Route::post('/newsletter/subscribe', [NewsletterController::class, 'subscribe'])->name('newsletter.subscribe');    
        Route::post('/reservationsItem', [UserReservationController::class, 'store'])->name('userStore');
        Route::middleware(['auth'])->group(function () {
        Route::get('/matches/{match}/book', [UserReservationController::class, 'create'])->name('user.reservations.create');     
        Route::get('/my-reservations', [UserReservationController::class, 'index'])->name('user.reservations.index');
        Route::put('/reservations/{reservation}/cancel', [UserReservationController::class, 'cancel'])->name('user.reservations.cancel');
        Route::get('/check-reservation/{match}', [UserReservationController::class, 'checkReservation'])
        ->name('check.reservation');
        Route::get('/booking-confirmation/{reservation}', [UserReservationController::class, 'showConfirmation'])
        ->name('booking.confirmation');
        Route::get('/bookings', [UserReservationController::class, 'showBookings'])->name('user.bookings');
        });

        // Venue Info
        Route::get('/venues1', [VenueInfoController::class, 'index'])->name('user.venues.index');
        Route::get('/venues/view/{id}', [UserVenueController::class, 'show'])->name('venues.view');

        // Venue Description
        Route::get('/venue-descriptions', [VenueDescriptionController::class, 'index'])->name('venue_descriptions.index');
        Route::get('/venue-descriptions/{id}', [VenueDescriptionController::class, 'show'])->name('venue_descriptions.show');

        // Display the contact form (located in 'home/index.blade.php')
        Route::get('user/home/index', [ContactController::class, 'create'])->name('user.home.index');
        Route::post('user/home/index', [ContactController::class, 'store'])->name('user.home.index');

        // List all categories (not specific to one category)
        Route::get('/categories', [UserCategoryController::class, 'index'])->name('user.categories.index');

        // Display specific category details
        Route::get('/categories/{id}', [UserCategoryController::class, 'show'])->name('user.categories.show');
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

        Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
        Route::post('/login', [LoginController::class, 'login']);

        
        // ------------------------- AUTHENTICATION ----------------------------

        // Guest routes (Only accessible for unauthenticated users)
        Route::middleware('guest')->group(function () {
            Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
            Route::post('/login', [LoginController::class, 'login']);
        });

        // Logout (Accessible by authenticated users only)
        Route::middleware('auth')->post('/logout', [AuthenticatedSessionController::class, 'destroy'])->name('logout');

    // ------------------------- ADMIN DASHBOARD ---------------------------

        // Admin Routes
        Route::middleware(['auth', 'admin'])->group(function () {
        Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
        Route::resource('categories', CategoryController::class)->names([
            'index' => 'admin.categories.index',
            'store' => 'admin.categories.store',
            'edit' => 'admin.categories.edit',
            'update' => 'admin.categories.update',
            'destroy' => 'admin.categories.destroy'
        ]);

        Route::get('category/create' ,[CategoryController::class , 'create'])->name('admin.categories.create');
        
    
        // Matches Management
        Route::resource('matches', GameMatchController::class)->names([
            'index' => 'admin.matches.index',
            'create' => 'admin.matches.create',
            'store' => 'admin.matches.store',
            'edit' => 'admin.matches.edit',
            'update' => 'admin.matches.update',
            'destroy' => 'admin.matches.destroy'
        ]);
    
        // Reservations Management
        Route::resource('reservations', ReservationController::class)->names([
            'index' => 'admin.reservations.index',
            'create' => 'admin.reservations.create',
            'store' => 'admin.reservations.store',
            'edit' => 'admin.reservations.edit',
            'update' => 'admin.reservations.update',
            'destroy' => 'admin.reservations.destroy'
        ]);

        Route::resource('venues', AdminVenueInfoController::class)->names([
            'index' => 'admin.venues.index',
            'create' => 'admin.venues.create',
            'store' => 'admin.venues.store',
            'show' => 'admin.venues.show',
            'edit' => 'admin.venues.edit',
            'update' => 'admin.venues.update',
            'destroy' => 'admin.venues.destroy'
        ]);
    
        Route::resource('venue_descriptions', AdminVenueDescriptionController::class)->names([
            'index' => 'admin.venue_descriptions.index',
            'create' => 'admin.venue_descriptions.create',
            'store' => 'admin.venue_descriptions.store',
            'show' => 'admin.venue_descriptions.show',
            'edit' => 'admin.venue_descriptions.edit',
            'update' => 'admin.venue_descriptions.update',
            'destroy' => 'admin.venue_descriptions.destroy'
        ]);
    
        
    });
    

    // ---------------------- AUTHENTICATED USERS --------------------------

    Route::middleware('auth')->group(function () {
        // User Profile
        Route::get('/profile', [ProfileController::class, 'show'])->name('profile.show');
        Route::get('/profile/edit', [ProfileController::class, 'edit'])->name('profile.edit');
        Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
        Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
        Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

    });

    // --------------------- BREEZE AUTH ROUTES ----------------------------

    require __DIR__ . '/auth.php';

    