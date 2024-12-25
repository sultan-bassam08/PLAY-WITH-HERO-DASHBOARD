<!-- resources/views/user/theme/partials/header.blade.php -->

<header class="header">

    <!-- Overlay -->
    <div class="overlay" data-overlay></div>

    <div class="container">
        <!-- Logo -->
        <a href="{{ route('home') }}" class="logo">
            <img src="{{ asset('assets/images/logo.svg') }}" alt="Play with hero logo">
        </a>
        <!-- Mobile Menu Button -->
        <button class="nav-open-btn" data-nav-open-btn>
            <ion-icon name="menu-outline"></ion-icon>
        </button>

        <!-- Navigation -->
        <nav class="navbar" data-nav>
            <div class="navbar-top">

                <!-- Logo for Mobile View -->
                <a href="{{ route('home') }}" class="logo">
                    <img src="{{ asset('assets/images/logo.svg') }}" alt="GameX logo">
                </a>

                <!-- Close Button for Mobile Nav -->
                <button class="nav-close-btn" data-nav-close-btn>
                    <ion-icon name="close-outline"></ion-icon>
                </button>
            </div>

            <!-- Navbar Links -->
            <ul class="navbar-list">
                <li>
                    <a href="#hero" class="navbar-link">Home</a>
                </li>
                <li>
                    <a href="#about" class="navbar-link">About</a>
                </li>
                <li>
                    <a href="#Category" class="navbar-link">Category</a>
                </li>
                <li>
                    <a href="#contact" class="navbar-link">Contact</a>
                </li>
                
                
            </ul>

            <!-- Social Media Links -->
            <ul class="nav-social-list">
                <li>
                    <a href="#" class="social-link">
                        <ion-icon name="logo-facebook"></ion-icon>
                    </a>
                </li>
                <li>
                    <a href="#" class="social-link">
                        <ion-icon name="logo-instagram"></ion-icon>
                    </a>
                </li>
               
            </ul>
        </nav>

        <!-- Actions (Sign-in & Sign-up) -->
        <div class="header-actions">
            @guest
                <!-- When User is NOT Logged In -->
                <a href="{{ route('auth.login') }}" class="btn-sign_in">
                    <div class="icon-box">
                        <ion-icon name="log-in-outline"></ion-icon>
                    </div>
                    <span>Sign-in</span>
                </a>

                <a href="{{ route('register') }}" class="btn-sign_in">
                    <div class="icon-box">
                        <ion-icon name="log-in-outline"></ion-icon>
                    </div>
                    <span>Sign-up</span>
                </a>
            @endguest

            @auth
                <!-- When User IS Logged In -->
                <a href="{{ route('user.profile.index') }}" class="btn-sign_in">
                    <div class="icon-box">
                        <ion-icon name="person-outline"></ion-icon>
                    </div>
                    <span>Profile</span>
                </a>

                <form action="{{ route('logout') }}" method="POST" style="display: inline;">
                    @csrf
                    <button type="submit" class="btn-sign_in">
                        <div class="icon-box">
                            <ion-icon name="log-out-outline"></ion-icon>
                        </div>
                        <span>Logout</span>
                    </button>
                </form>
            @endauth
        </div>
    </div>

</header>

<!-- resources/views/user/theme/partials/header.blade.php -->
{{-- 
<header class="header">

    <!-- Overlay -->
    <div class="overlay" data-overlay></div>

    <div class="container">
        <!-- Logo -->
        <a href="{{ route('home') }}" class="logo">
            <img src="{{ asset('assets/images/logo.svg') }}" alt="Play with hero logo">
        </a>
        <!-- Mobile Menu Button -->
        <button class="nav-open-btn" data-nav-open-btn>
            <ion-icon name="menu-outline"></ion-icon>
        </button>

        <!-- Navigation -->
        <nav class="navbar" data-nav>
            <div class="navbar-top">

                <!-- Logo for Mobile View -->
                <a href="{{ route('home') }}" class="logo">
                    <img src="{{ asset('assets/images/logo.svg') }}" alt="GameX logo">
                </a>

                <!-- Close Button for Mobile Nav -->
                <button class="nav-close-btn" data-nav-close-btn>
                    <ion-icon name="close-outline"></ion-icon>
                </button>
            </div>

            <!-- Navbar Links -->
            <ul class="navbar-list">
                <li>
                    <a href="{{ route('home') }}" class="navbar-link">Home</a>
                </li>
                <li>
                    <a href="{{ route('home') }}" class="navbar-link">About</a>
                </li>
                <li>
                    <a href="#category" class="navbar-link">Category</a>
                    <ul>
                        @foreach($categories as $category)
                            <li>
                                <a href="{{ route('categories.show', $category->id) }}" class="navbar-link">
                                    {{ $category->name }}
                                </a>
                            </li>
                        @endforeach
                    </ul>
                </li>
                <li>
                    <a href="{{ route('home') }}" class="navbar-link">Contact</a>
                </li>
            </ul>

            <!-- Social Media Links -->
            <ul class="nav-social-list">
                <li>
                    <a href="#" class="social-link">
                        <ion-icon name="logo-facebook"></ion-icon>
                    </a>
                </li>
                <li>
                    <a href="#" class="social-link">
                        <ion-icon name="logo-instagram"></ion-icon>
                    </a>
                </li>
            </ul>
        </nav>

        <!-- Actions (Sign-in & Sign-up) -->
        <div class="header-actions">
            @guest
                <!-- When User is NOT Logged In -->
                <a href="{{ route('auth.login') }}" class="btn-sign_in">
                    <div class="icon-box">
                        <ion-icon name="log-in-outline"></ion-icon>
                    </div>
                    <span>Sign-in</span>
                </a>

                <a href="{{ route('register') }}" class="btn-sign_in">
                    <div class="icon-box">
                        <ion-icon name="log-in-outline"></ion-icon>
                    </div>
                    <span>Sign-up</span>
                </a>
            @endguest

            @auth
                <!-- When User IS Logged In -->
                <a href="{{ route('user.profile.index') }}" class="btn-sign_in">
                    <div class="icon-box">
                        <ion-icon name="person-outline"></ion-icon>
                    </div>
                    <span>Profile</span>
                </a>

                <form action="{{ route('logout') }}" method="POST" style="display: inline;">
                    @csrf
                    <button type="submit" class="btn-sign_in">
                        <div class="icon-box">
                            <ion-icon name="log-out-outline"></ion-icon>
                        </div>
                        <span>Logout</span>
                    </button>
                </form>
            @endauth
        </div>
    </div>

</header> --}}