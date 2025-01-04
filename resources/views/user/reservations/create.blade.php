<!DOCTYPE html>
<head>
    <meta charset="utf-8">
    <title>Book Match Slot</title>
    @include('user.partials.head-2')

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
                    <li><a href="{{ route('user.venues.index') }}">Venues</a></li>
                    <li class="active">Book Match</li>
                </ol>
            </div>
        </div>
    </div>
</div>

<main id="tg-main" class="tg-main tg-haslayout">
    <div class="container">
        <div class="row">
            <div class="col-md-12 offset-md-2" >
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
                    <form action="{{ route('userStore') }}" method="POST">
                        @csrf
                        <input type="hidden" name="match_id" value="{{ $match->id }}">
                        
                        <!-- Terms and Conditions -->
                        <div class="form-group" style="margin-bottom: 20px;font-size:1.6rem">
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="terms" name="terms" required>
                                <label class="custom-control-label" for="terms">I agree to the terms and conditions</label>
                            </div>
                        </div>
                        

                        <!-- Submit Button -->
                        <button type="submit" class="btn btn-primary" style=" width: 40%; padding: 15px;" 
                                {{ $currentSpots >= $venueDescription->max_spot ? 'disabled' : '' }}>
                                {{ $currentSpots >= $venueDescription->max_spot ? 'Match Full' : 'Confirm Booking' }}
                        </button>
                    </form>
                    @auth
                  
                    @else
                    <div class="alert alert-info">
                        Please <a href="{{ route('auth.login') }}">login</a> to book this match.
                    </div>
                    @endauth

                    <!-- Match Rules -->
                    <div class="match-rules" style="margin-top: 30px;">
                        <h3 style="color: #333; margin-bottom: 15px;">Match Rules</h3>
                        <ul style="list-style: none; padding: 0;font-size:1.5rem">
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

@include('user.partials.scripts-2')