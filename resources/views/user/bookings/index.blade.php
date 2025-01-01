@extends('user.layouts.app')
<link rel="stylesheet" href="{{ asset('assets/css/user-profile.css') }}">
@section('content')
<div class="container">
    <h1>My Bookings</h1>
    <div class="profile-header">
        <ul class="nav nav-tabs mb-4 justify-content-center">
            <li class="nav-item">
                <a class="nav-link {{ $status === 'waiting' ? 'active' : '' }}" href="{{ route('user.bookings', ['status' => 'waiting']) }}">Waiting</a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ $status === 'completed' ? 'active' : '' }}" href="{{ route('user.bookings', ['status' => 'completed']) }}">Completed</a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ $status === 'declined' ? 'active' : '' }}" href="{{ route('user.bookings', ['status' => 'declined']) }}">Cancelled</a>
            </li>
        </ul>
        
        <div class="bookings-content">
            @if($bookings->count() > 0)
                @foreach($bookings as $booking)
                    <div class="booking-card">
                        <h3>{{ $booking->match->venueDescription->venueInfo->name }}</h3>
                        <p><strong>Date:</strong> {{ $booking->match->match_date_time->format('d M Y H:i') }}</p>
                        <p><strong>Status:</strong> <span class="status-badge {{ $status }}">{{ ucfirst($status) }}</span></p>
                        @if($status === 'waiting')
                            <form action="{{ route('user.reservations.cancel', $booking) }}" method="POST" class="d-inline">
                                @csrf
                                @method('PUT')
                                <button type="submit" class="btn-cancel">Cancel Booking</button>
                            </form>
                        @endif
                    </div>
                @endforeach
            @else
                <div class="empty-state">
                    <p>No {{ $status }} bookings found</p>
                </div>
            @endif
        </div>
    </div>
</div>

<style>
    * {
        padding: 0;
        margin: 0;
        box-sizing: border-box;
    }

    .profile-header {
        margin-top: 100px; /* Adjusted for better spacing */
        margin-bottom: 50px; /* Added for spacing at the bottom */
        background: #fff;
        border-radius: 8px;
        padding: 30px;
        box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
    }

    .nav-tabs {
        border: none;
        margin-bottom: 30px;
    }

    .nav-tabs .nav-link {
        color: #666;
        padding: 12px 24px;
        margin: 0 5px;
        border: none;
        border-radius: 4px;
        transition: all 0.3s ease;
        font-weight: 500;
    }

    .nav-tabs .nav-link.active {
        background-color: #FF5722;
        color: white;
    }

    .nav-tabs .nav-link:hover:not(.active) {
        background-color: #f5f5f5;
    }

    .booking-card {
        background: #f8f9fa;
        border-radius: 8px;
        padding: 25px;
        margin-bottom: 20px;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.05);
        transition: transform 0.2s;
    }

    .booking-card:hover {
        transform: translateY(-2px);
    }

    .booking-card h3 {
        color: #333;
        font-size: 1.2rem;
        margin-bottom: 15px;
        font-weight: 600;
    }

    .booking-card p {
        margin-bottom: 10px;
        line-height: 1.6;
    }

    .booking-card strong {
        color: #333;
        font-weight: 600;
        display: inline-block;
        width: 80px;
    }

    .status-badge {
        padding: 6px 12px;
        border-radius: 4px;
        font-weight: 500;
        font-size: 0.9rem;
    }

    .status-badge.waiting {
        background-color: #ffeeba;
        color: #856404;
    }

    .status-badge.completed {
        background-color: #d4edda;
        color: #155724;
    }

    .status-badge.cancelled {
        background-color: #f8d7da;
        color: #721c24;
    }

    .btn-cancel {
        background-color: #dc3545;
        color: white;
        padding: 10px 20px;
        border: none;
        border-radius: 4px;
        font-weight: 500;
        transition: all 0.3s ease;
        margin-top: 10px;
    }

    .btn-cancel:hover {
        background-color: #c82333;
        transform: translateY(-1px);
    }

    .empty-state {
        text-align: center;
        padding: 40px 20px;
        background: #f8f9fa;
        border-radius: 8px;
        color: #666;
        font-size: 1.1rem;
    }

    @media (max-width: 1280px) {

.profile-header {
    margin-top: 140px; /* Reduced margin for mobile */
    padding: 20px; /* Reduced padding for mobile */
}
    }

    @media (max-width: 768px) {

        .profile-header {
            margin-top: 120px; /* Reduced margin for mobile */
            padding: 20px; /* Reduced padding for mobile */
        }

        .nav-tabs .nav-link {
            padding: 10px 16px; /* Adjusted padding for mobile */
            font-size: 0.9rem; /* Reduced font size for mobile */
        }

        .booking-card {
            padding: 20px; /* Reduced padding for mobile */
        }

        .empty-state {
            padding: 20px 10px; /* Reduced padding for mobile */
            font-size: 1rem; /* Reduced font size for mobile */
        }
    }
</style>
@endsection