<!DOCTYPE html>
<head>
    <meta charset="utf-8">
    <title>Book Match Slot</title>
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/main.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/color.css') }}">
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
                    <h1>Book Match Slot</h1>
                </div>
                <ol class="tg-breadcrumb">
                    <li><a href="{{ route('home') }}">Home</a></li>
                    <li><a href="{{ route('venues.index') }}">Venues</a></li>
                    <li class="active">Book Match</li>
                </ol>
            </div>
        </div>
    </div>
</div>

<main id="tg-main" class="tg-main tg-haslayout">
    <div class="container">
        <div class="row">
            <div class="col-md-8 offset-md-2">
                <div class="booking-container" style="background: white; border-radius: 8px; padding: 30px; box-shadow: 0 2px 6px rgba(0,0,0,0.05); margin-bottom: 30px;">
                    <!-- Match Details Section -->
                    <div class="match-details" style="margin-bottom: 30px; padding-bottom: 20px; border-bottom: 1px solid #eee;">
                        <h3 style="color: #333; margin-bottom: 20px;">Match Details</h3>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="info-item" style="margin-bottom: 15px;">
                                    <i class="fa fa-map-marker" style="color: #e5af26; margin-right: 10px;"></i>
                                    <span>{{ $venue->name }}</span>
                                </div>
                                <div class="info-item" style="margin-bottom: 15px;">
                                    <i class="fa fa-calendar" style="color: #e5af26; margin-right: 10px;"></i>
                                    <span>{{ $match->match_date_time->format('M d, Y') }}</span>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="info-item" style="margin-bottom: 15px;">
                                    <i class="fa fa-clock" style="color: #e5af26; margin-right: 10px;"></i>
                                    <span>{{ $match->match_date_time->format('h:i A') }}</span>
                                </div>
                                <div class="info-item" style="margin-bottom: 15px;">
                                    <i class="fa fa-users" style="color: #e5af26; margin-right: 10px;"></i>
                                    <span>
                                    {{ $currentSpots }} / {{ $venueDescription->max_spot }} spots taken
                                    ({{ $venueDescription->max_spot - $currentSpots }} available)
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Booking Form -->
                    @auth
                    <form action="{{ route('reservations.store') }}" method="POST">
                        @csrf
                        <input type="hidden" name="match_id" value="{{ $match->id }}">
                        
                        <!-- Terms and Conditions -->
                        <div class="form-group" style="margin-bottom: 20px;">
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="terms" name="terms" required>
                                <label class="custom-control-label" for="terms">I agree to the terms and conditions</label>
                            </div>
                        </div>
                        

                        <!-- Submit Button -->
                        <button type="submit" class="tg-btn" style="background: #e5af26; width: 100%; padding: 15px; border: none; border-radius: 5px; color: white; font-size: 16px;" 
                                {{ $currentSpots >= $venueDescription->max_spot ? 'disabled' : '' }}>
                                {{ $currentSpots >= $venueDescription->max_spot ? 'Match Full' : 'Confirm Booking' }}
                        </button>
                    </form>
                    @else
                    <div class="alert alert-info">
                        Please <a href="{{ route('auth.login') }}">login</a> to book this match.
                    </div>
                    @endauth

                    <!-- Match Rules -->
                    <div class="match-rules" style="margin-top: 30px;">
                        <h4 style="color: #333; margin-bottom: 15px;">Match Rules</h4>
                        <ul style="list-style: none; padding: 0;">
                            <li style="margin-bottom: 10px;">
                                <i class="fa fa-check" style="color: #e5af26; margin-right: 10px;"></i>
                                Please arrive 15 minutes before the match time
                            </li>
                            <li style="margin-bottom: 10px;">
                                <i class="fa fa-check" style="color: #e5af26; margin-right: 10px;"></i>
                                Bring appropriate sports equipment and attire
                            </li>
                            <li style="margin-bottom: 10px;">
                                <i class="fa fa-check" style="color: #e5af26; margin-right: 10px;"></i>
                                Cancellations must be made at least 24 hours in advance
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>

        <script src="{{ asset('assets/script/vendor/jquery-library.js') }}"></script>
        <script src="{{ asset('assets/script/vendor/bootstrap.min.js') }}"></script>
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
        