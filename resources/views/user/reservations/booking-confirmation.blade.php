<!DOCTYPE html>
<head>
    <meta charset="utf-8">
    <title>Play-Withh-Hero |Booking Confirmation</title>
    <link rel="icon" href="{{ asset('assets/images/logo.svg') }}" type="image/svg+xml">

    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <style>
        :root {
            --raisin-black-1: hsl(234, 14%, 14%);
            --raisin-black-2: hsl(231, 12%, 12%);
            --raisin-black-3: hsl(228, 12%, 17%);
            --eerie-black: hsl(240, 11%, 9%);
            --light-gray: hsl(0, 0%, 80%);
            --platinum: hsl(0, 4%, 91%);
            --xiketic: hsl(275, 24%, 10%);
            --orange: hsl(45, 83%, 55%);
            --white: hsl(0, 0%, 100%);
            --onyx: hsl(240, 5%, 26%);
            
            --ff-refault: "Refault", Georgia;
            --ff-oswald: "Oswald", sans-serif;
            --ff-poppins: "Poppins", sans-serif;
            
            --polygon-1: polygon(90% 0, 100% 34%, 100% 100%, 10% 100%, 0 66%, 0 0);
        }

        body {
            background: var(--raisin-black-2);
            font-family: var(--ff-poppins);
            color: var(--white);
        }

        .confirmation-container {
            max-width: 600px;
            margin: 50px auto;
            padding: 30px;
            background: var(--raisin-black-3);
            clip-path: var(--polygon-1);
            text-align: center;
        }

        .check-icon {
            width: 80px;
            height: 80px;
            background: var(--raisin-black-1);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 20px;
        }

        .check-icon i {
            color: var(--orange);
            font-size: 40px;
        }

        .booking-title {
            font-family: var(--ff-oswald);
            font-size: 24px;
            color: var(--white);
            margin-bottom: 10px;
            text-transform: uppercase;
        }

        .booking-subtitle {
            color: var(--light-gray);
            margin-bottom: 30px;
        }

        .booking-details {
            text-align: left;
            margin: 30px 0;
        }

        .booking-reference {
            display: flex;
            justify-content: space-between;
            padding-bottom: 20px;
            margin-bottom: 20px;
            border-bottom: 1px solid var(--onyx);
            color: var(--light-gray);
        }

        .detail-row {
            display: flex;
            align-items: center;
            margin-bottom: 20px;
        }

        .detail-icon {
            color: var(--orange);
            margin-right: 15px;
            width: 20px;
        }

        .detail-row strong {
            color: var(--white);
            font-family: var(--ff-oswald);
            text-transform: uppercase;
        }

        .detail-row div {
            color: var(--light-gray);
        }

        .button-container {
            margin-top: 30px;
            display: flex;
            gap: 15px;
            justify-content: center;
        }

        .btn {
            font-family: var(--ff-oswald);
            font-size: var(--fs-6);
            text-transform: uppercase;
            letter-spacing: 1px;
            display: inline-flex;
            align-items: center;
            gap: 10px;
            padding: 13px 34px;
            clip-path: var(--polygon-1);
            transition: 0.15s ease-in-out;
            cursor: pointer;
            text-decoration: none;
        }

        .view-bookings-btn {
            background: var(--orange);
            color: var(--white);
        }

        .return-home-btn {
            background: var(--raisin-black-1);
            color: var(--white);
        }

        .btn:hover {
            background: var(--orange);
            color: var(--white);
        }

        @media (max-width: 768px) {
            .confirmation-container {
                margin: 20px;
                padding: 20px;
            }

            .button-container {
                flex-direction: column;
            }

            .btn {
                font-size: 16px;
                padding: 10px 20px;
            }
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
            <a href="{{ route('user.bookings') }}" class="btn view-bookings-btn">View My Bookings</a>
            <a href="{{ route('home') }}" class="btn return-home-btn">Return to Home</a>
        </div>
    </div>
</body>
</html>