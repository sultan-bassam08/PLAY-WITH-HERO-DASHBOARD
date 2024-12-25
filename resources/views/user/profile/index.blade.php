@extends('user.layouts.app')
<link rel="stylesheet" href="{{ asset('assets/css/user-profile.css') }}">
@section('content')
<style>
    /* Main content area with navbar and footer spacing */
.main-content {
    padding-top: 120px; /* Space for navbar */
    padding-bottom: 100px; /* Space for footer */
    padding-left: 20px;
    padding-right: 20px;
    min-height: calc(100vh - 200px);
    background-color: #f5f5f5; /* Light background to separate content */
}

/* Profile header with proper spacing */
.profile-header {
    background: #fff;
    border-radius: 8px;
    padding: 30px;
    box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
    margin: 0 auto;
    max-width: 800px;
    position: relative;
    margin-top: 100px;
}

.profile-picture {
    width: 150px;
    height: 150px;
    border-radius: 50%;
    object-fit: cover;
    margin-bottom: 20px;
    border: 4px solid #fff;
    box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
    display: block;
}

.profile-header h1 {
    color: #333;
    margin-bottom: 20px;
    font-size: 2rem;
    text-align: center;
}

.profile-header h2 {
    color: #444;
    margin-bottom: 15px;
    font-size: 1.5rem;
}

.profile-header p {
    color: #666;
    margin-bottom: 12px;
    font-size: 1rem;
    line-height: 1.6;
}

.profile-header strong {
    color: #333;
    font-weight: 600;
    display: inline-block;
    width: 120px;
}

.btn-primary {
    background-color: #FF5722;
    color: white;
    padding: 12px 24px;
    border: none;
    border-radius: 4px;
    text-decoration: none;
    display: inline-block;
    margin-top: 20px;
    transition: background-color 0.3s ease;
}

.btn-primary:hover {
    background-color: #F4511E;
}

/* Footer spacing fix */
footer {
    margin-top: auto; /* Push footer to bottom */
    padding: 20px 0;
}

/* Responsive adjustments */
@media (max-width: 768px) {
    .main-content {
        padding-top: 100px; /* Smaller padding on mobile */
        padding-bottom: 80px;
        padding-left: 15px;
        padding-right: 15px;
    }

    .profile-header {
        padding: 20px;
    }

    .profile-picture {
        width: 120px;
        height: 120px;
        margin: 0 auto 20px auto;
    }
}

/* Extra small devices */
@media (max-width: 576px) {
    .main-content {
        padding-top: 80px;
        padding-bottom: 60px;
    }
}
</style>
<div class="container">
    <h1>User Profile</h1>
    <div class="profile-header">
        <img 
            src="{{ $user->profile_picture ? asset('storage/' . $user->profile_picture) : asset('default-user-avatar.png') }}" 
            alt="Profile Picture" 
            class="profile-picture"
        >
        <h2>{{ $user->name }}</h2>
        <p><strong>Bio:</strong> {{ $user->bio ?? 'No bio provided.' }}</p>
        <p><strong>Email:</strong> {{ $user->email }}</p>
        <p><strong>Phone:</strong> {{ $user->phone ?? 'Not available' }}</p>
        <p><strong>Address:</strong> {{ $user->address ?? 'Not available' }}</p>
        <p><strong>Gender:</strong> {{ ucfirst($user->gender) ?? 'Not specified' }}</p>
        <p><strong>Date of Birth:</strong> {{ $user->date_of_birth ?? 'Not specified' }}</p>

        <a href="{{ route('user.profile.edit') }}" class="btn btn-primary">Edit Profile</a>
    </div>
</div>
@endsection
