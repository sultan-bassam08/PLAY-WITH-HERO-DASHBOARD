<!DOCTYPE html>
<head>
    <meta charset="utf-8">
    <title>Booking Confirmation</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <style>
        .confirmation-container {
            max-width: 600px;
            margin: 50px auto;
            padding: 30px;
            background: white;
            border-radius: 10px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
            text-align: center;
        }

        .check-icon {
            width: 80px;
            height: 80px;
            background: #f8f9fa;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 20px;
        }

        .check-icon i {
            color: #ff5722;
            font-size: 40px;
        }

        .booking-title {
            font-size: 24px;
            color: #333;
            margin-bottom: 10px;
        }

        .booking-subtitle {
            color: #666;
            margin-bottom: 30px;
        }

        .booking-details {
            text-align: left;
            margin: 30px 0;
        }

        .detail-row {
            display: flex;
            align-items: center;
            margin-bottom: 20px;
        }

        .detail-icon {
            color: #ff5722;
            margin-right: 15px;
            width: 20px;
        }

        .booking-reference {
            display: flex;
            justify-content: space-between;
            padding-bottom: 20px;
            margin-bottom: 20px;
            border-bottom: 1px solid #eee;
        }

        .button-container {
            margin-top: 30px;
        }

        .view-bookings-btn {
            background: #ff5722;
            color: white;
            padding: 12px 25px;
            border-radius: 5px;
            text-decoration: none;
            display: inline-block;
            margin-right: 10px;
        }

        .return-home-btn {
            background: white;
            color: #333;
            padding: 12px 25px;
            border-radius: 5px;
            text-decoration: none;
            border: 1px solid #ddd;
            display: inline-block;
        }
    </style>
</head>
<body>
    <div class="confirmation-container">
        <div class="check-icon">
            <i class="fas fa-check"></i>
        </div>
        
        <h1 class="booking-title">Booking Confirmed!</h1>
        <p class="booking-subtitle">Thank you for choosing our service</p>

        <div class="booking-details">
            <div class="booking-reference">
                <span>Booking Reference</span>
                <strong>#{{ $reservation->id }}</strong>
            </div>

            <div class="detail-row">
                <i class="fas fa-map-marker-alt detail-icon"></i>
                <div>
                    <strong>Venue</strong><br>
                    {{ $reservation->match->venueDescription->venueInfo->name }}
                </div>
            </div>

            <div class="detail-row">
                <i class="far fa-calendar detail-icon"></i>
                <div>
                    <strong>Date</strong><br>
                    {{ $reservation->match->match_date_time->format('D, d M Y') }}
                </div>
            </div>

            <div class="detail-row">
                <i class="fas fa-users detail-icon"></i>
                <div>
                    <strong>Maximum Players</strong><br>
                    {{ $reservation->match->venueDescription->max_spot }} players
                </div>
            </div>

            <div class="detail-row">
                <i class="far fa-credit-card detail-icon"></i>
                <div>
                    <strong>Status</strong><br>
                    {{ ucfirst($reservation->reservation_status) }}
                </div>
            </div>
        </div>

        <div class="button-container">
            <a href="{{ route('user.bookings') }}" class="view-bookings-btn">View My Bookings</a>
            <a href="{{ route('home') }}" class="return-home-btn">Return to Home</a>
        </div>
    </div>
</body>
</html>