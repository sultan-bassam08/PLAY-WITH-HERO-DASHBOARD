<head>
	<meta charset="utf-8">
	<meta name="csrf-token" content="{{ csrf_token() }}">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Soccer BootStrap HTML5 CSS3 Theme</title>
	<meta name="description" content="">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<!-- Stylesheets -->
	<link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">
	<link rel="stylesheet" href="{{ asset('assets/css/normalize.css') }}">
	<link rel="stylesheet" href="{{ asset('assets/css/font-awesome.min.css') }}">
	<link rel="stylesheet" href="{{ asset('assets/css/transitions.css') }}">
	<link rel="stylesheet" href="{{ asset('assets/css/prettyPhoto.css') }}">
	<link rel="stylesheet" href="{{ asset('assets/css/swiper.min.css') }}">
	<link rel="stylesheet" href="{{ asset('assets/css/jquery-ui.css') }}">
	<link rel="stylesheet" href="{{ asset('assets/css/animate.css') }}">
	<link rel="stylesheet" href="{{ asset('assets/css/owl.theme.css') }}">
	<link rel="stylesheet" href="{{ asset('assets/css/owl.carousel.css') }}">
	<link rel="stylesheet" href="{{ asset('assets/css/customScrollbar.css') }}">
	<link rel="stylesheet" href="{{ asset('assets/css/icomoon.css') }}">
	<link rel="stylesheet" href="{{ asset('assets/css/main.css') }}">
	<link rel="stylesheet" href="{{ asset('assets/css/color.css') }}">
	<link rel="stylesheet" href="{{ asset('assets/css/responsive.css') }}">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
   
	
    
        
      
</head>
<div class="tg-banner tg-haslayout">
    <div class="tg-imglayer">
        <img src="{{ asset('assets/images/bg-pattran.png') }}" alt="image description">
    </div>
    <div class="container">
        <div class="row">
            <div class="tg-banner-content tg-haslayout">
                <div class="tg-pagetitle">
                    <h1>{{ $venue->name }}</h1>
                </div>
                <ol class="tg-breadcrumb">
                    <li><a href="{{ route('home') }}">Home</a></li>
                    <li><a href="#">Categories</a></li>
                    <li class="active">Venue Details</li>
                </ol>
            </div>
        </div>
    </div>
</div>

<main id="tg-main" class="tg-main tg-haslayout">
    <div class="container">
        <!-- Venue Details Section -->
        <div class="row">
            <!-- Venue Image and Basic Info -->
            <div class="col-md-12">
                <div class="tg-venue-header" style="background: #f5f5f5; border-radius: 10px; padding: 30px; margin-bottom: 30px;">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="tg-venue-image" style="text-align: center;">
                                <img src="{{ $venue->img_venue ? asset('storage/' . $venue->img_venue) : asset('assets/images/default_logo.png') }}" 
                                     alt="{{ $venue->name }}"
                                     style="max-width: 100%; height: auto; border-radius: 8px; box-shadow: 0 4px 8px rgba(0,0,0,0.1);">
                            </div>
                        </div>
                        <div class="col-md-8">
                            <div class="tg-venue-info" style="padding-left: 20px;">
                                <h2 style="font-size: 32px; color: #333; margin-bottom: 20px;">{{ $venue->name }}</h2>
                                <div class="venue-quick-info">
                                    <div class="info-item" style="margin-bottom: 15px;">
                                        <i class="fa fa-map-marker" style="color: #e5af26; margin-right: 10px;"></i>
                                        <span>{{ $venue->address }}</span>
                                    </div>
                                    @if($venue->contact_number)
                                    <div class="info-item" style="margin-bottom: 15px;">
                                        <i class="fa fa-phone" style="color: #e5af26; margin-right: 10px;"></i>
                                        <span>{{ $venue->contact_number }}</span>
                                    </div>
                                    @endif
                                    @if($venue->email)
                                    <div class="info-item">
                                        <i class="fa fa-envelope" style="color: #e5af26; margin-right: 10px;"></i>
                                        <span>{{ $venue->email }}</span>
                                    </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Venue Descriptions -->
            @foreach($venue->venueDescriptions as $description)
            <div class="col-md-12">
                <div class="tg-venue-category-section" style="background: white; border-radius: 8px; padding: 30px; box-shadow: 0 2px 6px rgba(0,0,0,0.05); margin-bottom: 30px;">
                    <h3 style="color: #333; margin-bottom: 20px; padding-bottom: 10px; border-bottom: 2px solid #e5af26;">
                        {{ $description->category->name ?? 'General Information' }}
                    </h3>
                    
                    <div class="row">
                        <!-- Capacity Info -->
                        <div class="col-md-4">
                            <div class="tg-info-card" style="text-align: center; margin-bottom: 20px;">
                                <i class="fa fa-users" style="font-size: 36px; color: #e5af26; margin-bottom: 15px;"></i>
                                <h4 style="font-size: 20px; color: #333;">Maximum Capacity</h4>
                                <p style="font-size: 24px; color: #666;">{{ $description->max_spot ?? 'N/A' }} players</p>
                            </div>
                        </div>

                        <!-- Game Duration -->
                        <div class="col-md-4">
                            <div class="tg-info-card" style="text-align: center; margin-bottom: 20px;">
                                <i class="fa fa-clock-o" style="font-size: 36px; color: #e5af26; margin-bottom: 15px;"></i>
                                <h4 style="font-size: 20px; color: #333;">Game Duration</h4>
                                <p style="font-size: 24px; color: #666;">
                                    @php
                                        $firstMatch = $description->matches->first();
                                        $duration = $firstMatch ? $firstMatch->game_duration : 'N/A';
                                    @endphp
                                    {{ $duration }} @if($duration !== 'N/A') minutes @endif
                                </p>
                            </div>
                        </div>

                        <!-- Available Spots -->
                        <div class="col-md-4">
                            <div class="tg-info-card" style="text-align: center; margin-bottom: 20px;">
                                <i class="fa fa-futbol-o" style="font-size: 36px; color: #e5af26; margin-bottom: 15px;"></i>
                                <h4 style="font-size: 20px; color: #333;">Category Type</h4>
                                <p style="font-size: 24px; color: #666;">{{ $description->category->name ?? 'N/A' }}</p>
                            </div>
                        </div>
                    </div>

                    <!-- Description -->
                    <div class="venue-description" style="margin-top: 20px;">
                        <h4 style="color: #333; margin-bottom: 15px;">Description</h4>
                        <p style="color: #666; line-height: 1.6;">{{ $description->playground_description ?? 'No description available.' }}</p>
                    </div>

                    <!-- Upcoming Matches -->
                    @if($description->matches->isNotEmpty())
                    <div class="upcoming-matches" style="margin-top: 30px;">
                        <h4 style="color: #333; margin-bottom: 15px;">Upcoming Matches</h4>
                        <div class="match-list">
                            @foreach($description->matches->where('match_date_time', '>', now()) as $match)
                            <div class="match-item" style="background: #f9f9f9; padding: 15px; border-radius: 8px; margin-bottom: 10px;">
                                <div class="row align-items-center">
                                    <div class="col-md-4">
                                        <strong>Date:</strong> {{ $match->match_date_time->format('M d, Y') }}
                                    </div>
                                    <div class="col-md-4">
                                        <strong>Time:</strong> {{ $match->match_date_time->format('h:i A') }}
                                    </div>
                                    <div class="col-md-4">
                                        @if(Auth::check())
                                        <a href="{{ route('reservations.create', $match->id) }}" class="tg-btn">
                                            Join Match
                                        </a>
                                    @else
                                        <a href="{{ route('auth.login') }}" class="tg-btn">
                                            Login to Join Match
                                        </a>
                                    @endif
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                    @endif
                </div>
            </div>
            @endforeach
        </div>
    </div>
</main>



<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    @if(session('swal'))
        Swal.fire({
            icon: "{{ session('swal.type') }}",
            title: "{{ session('swal.title') }}",
            text: "{{ session('swal.text') }}",
        });
    @endif
</script>
        <script src="{{ asset('assets/script/vendor/jquery-library.js') }}"></script>
        <script src="{{ asset('assets/script/vendor/bootstrap.min.js') }}"></script>
        <script src="{{ asset('assets/script/customScrollbar.min.js') }}"></script>
        <script src="{{ asset('assets/script/owl.carousel.js') }}"></script>
        <script src="{{ asset('assets/script/isotope.pkgd.js') }}"></script>
        <script src="{{ asset('assets/script/prettyPhoto.js') }}"></script>
        <script src="{{ asset('assets/script/swiper.min.js') }}"></script>
        <script src="{{ asset('assets/script/jquery-ui.js') }}"></script>
        <script src="{{ asset('assets/script/countTo.js') }}"></script>
        <script src="{{ asset('assets/script/appear.js') }}"></script>
        <script src="{{ asset('assets/script/main.js') }}"></script>
        <script src="{{ asset('assets/script/vendor/modernizr-2.8.3-respond-1.4.2.min.js') }}"></script>
        