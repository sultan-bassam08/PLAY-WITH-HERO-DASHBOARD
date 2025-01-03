
@if(auth()->check() && auth()->user())
<div id="layoutSidenav">
    <div id="layoutSidenav_nav">
        <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
            <div class="sb-sidenav-menu">
                <div class="nav">
                    <!-- Sidebar Header -->
                    <div class="sb-sidenav-menu-heading">ADMIN PANEL</div>

                    <!-- Dashboard Link -->
                    <a class="nav-link {{ request()->routeIs('dashboard') ? 'active' : '' }}" 
                       href="{{ route('dashboard') }}">
                        <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                        Dashboard
                    </a>

                    <!-- Reservations -->
                    <a class="nav-link {{ request()->routeIs('reservations.*') ? 'active' : '' }}" 
                       href="{{ route('admin.reservations.index') }}">
                        <div class="sb-nav-link-icon"><i class="fas fa-calendar-check"></i></div>
                        Reservations
                    </a>

                    <!-- Matches -->
                    <a class="nav-link {{ request()->routeIs('matches.*') ? 'active' : '' }}" 
                       href="{{ route('admin.matches.index') }}">
                        <div class="sb-nav-link-icon"><i class="fas fa-futbol"></i></div>
                        Matches
                    </a>

                    <!-- Categories -->
                    <a class="nav-link {{ request()->routeIs('categories.*') ? 'active' : '' }}" 
                       href="{{ route('admin.categories.index') }}">
                        <div class="sb-nav-link-icon"><i class="fas fa-list"></i></div>
                        Categories
                    </a>
                    {{-- venues --}}

                    <a href="{{ route('admin.venues.index') }}" class="nav-link">
                            <div class="sb-nav-link-icon"><i class="nav-icon fas fa-building"></i></div>
                            Venues
                    </a>
                   {{-- venue_descriptions --}}
                   <a href="{{ route('admin.venue_descriptions.index') }}" class="nav-link">
                    <div class="sb-nav-link-icon"><i class="nav-icon fas fa-info-circle"></i></div>
                    Venue Descriptions
                    </a>

                    <!-- Logout -->
                    <form action="{{ route('logout') }}" method="POST" class="mt-auto">
                        @csrf
                        <button type="submit" class="btn btn-secondary mx-3 my-2">Logout</button>
                    </form>
                </div>
            </div>

            <!-- Sidebar Footer -->
            <div class="sb-sidenav-footer">
                <div class="small">Logged in as:</div>
                {{ auth()->user()->name }} (Admin)
            </div>
        </nav>
    </div>
</div>
@endif