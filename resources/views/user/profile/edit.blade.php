@extends('user.layouts.app')
<head>
    <title>Play-With-Hero | Edit Information</title>
<link rel="stylesheet" href="{{ asset('assets/css/edit-profile.css') }}">
</head>

@section('content')

<style>


.main-content {
    padding-top: 120px;
    padding-bottom: 100px;
    padding-left: 20px;
    padding-right: 20px;
    min-height: calc(100vh - 200px);
    background-color: #f5f5f5;
}


.save-btn {
    width: 100%;
    padding: 15px;
    background-color: #FF5722;
    color: white;
    border: none;
    border-radius: 4px;
    font-size: 16px;
    text-transform: uppercase;
    cursor: pointer;
    text-decoration: none;
    text-align: center;
}


.cancel-btn {
    width: 100%;
    padding: 15px;
    background-color: #6B728E;
    color: white;
    border: none;
    border-radius: 4px;
    font-size: 16px;
    text-transform: uppercase;
    cursor: pointer;
    text-decoration: none;
    text-align: center;
}



.edit-profile-form {
    background: #fff;
    border-radius: 8px;
    padding: 30px;
    box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
    margin: 0 auto;
    max-width: 800px;
}

.edit-profile-form h1 {
    color: #333;
    margin-bottom: 30px;
    font-size: 2rem;
    text-align: center;
}



.form-group {
    margin-bottom: 20px;
}

.form-label {
    display: block;
    color: #333;
    font-weight: 600;
    margin-bottom: 8px;
}

.form-control {
    width: 100%;
    padding: 10px;
    border: 1px solid #ddd;
    border-radius: 4px;
    font-size: 16px;
}

.form-control:focus {
    border-color: #FF5722;
    outline: none;
    box-shadow: 0 0 0 2px rgba(255, 87, 34, 0.2);
}

textarea.form-control {
    min-height: 100px;
    resize: vertical;
}

.button-group {
    display: flex;
    justify-content: space-between;
    margin-top: 30px;
    gap: 15px;
}

.btn {
    padding: 12px 24px;
    border: none;
    border-radius: 4px;
    font-size: 16px;
    cursor: pointer;
    text-decoration: none;
    transition: background-color 0.3s ease;
}

.btn-success {
    background-color: #FF5722;
    color: white;
}

.btn-success:hover {
    background-color: #F4511E;
}

.btn-secondary {
    background-color: #6c757d;
    color: white;
}

.btn-secondary:hover {
    background-color: #5a6268;
}

@media (max-width: 768px) {
    .main-content {
        padding-top: 100px;
        padding-bottom: 80px;
        padding-left: 15px;
        padding-right: 15px;
    }

    .edit-profile-form {
        padding: 20px;
    }

    .button-group {
        flex-direction: column;
    }

    .btn {
        width: 100%;
        margin-bottom: 10px;
    }
}
</style>
<div class="container">
    <h1>Edit Profile</h1>
    <form action="{{ route('user.profile.update') }}" method="POST" enctype="multipart/form-data" style="margin-top:150px;margin-bottom:100px;">
        @csrf
        @method('PUT')

        <!-- Profile Picture -->
        <div class="mb-3">
            <label for="profile_picture" class="form-label">Profile Picture</label>
            <input type="file" name="profile_picture" class="form-control" accept="image/*">
            @if($user->profile_picture)
                <img src="{{ asset('storage/' . $user->profile_picture) }}" alt="Current Profile Picture" class="img-thumbnail mt-2" style="max-width: 150px;">
            @endif
        </div>

        <!-- Name Field -->
        <div class="mb-3">
            <label for="name" class="form-label">Name</label>
            <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name', $user->name) }}" required>
            @error('name')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <!-- Email -->
        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" name="email" class="form-control" value="{{ old('email', $user->email) }}" required>
        </div>

        <!-- Phone -->
        <div class="mb-3">
            <label for="phone" class="form-label">Phone</label>
            <input type="text" name="phone" class="form-control" value="{{ old('phone', $user->phone) }}">
        </div>

        <!-- Address -->
        <div class="mb-3">
            <label for="address" class="form-label">Address</label>
            <input type="text" name="address" class="form-control" value="{{ old('address', $user->address) }}">
        </div>

        <!-- Gender -->
        <div class="mb-3">
            <label for="gender" class="form-label">Gender</label>
            <select name="gender" class="form-control">
                <option value="">Select Gender</option>
                <option value="male" {{ old('gender', $user->gender) == 'male' ? 'selected' : '' }}>Male</option>
                <option value="female" {{ old('gender', $user->gender) == 'female' ? 'selected' : '' }}>Female</option>
            </select>
        </div>

        <!-- Date of Birth -->
        <div class="mb-3">
            <label for="date_of_birth" class="form-label">Date of Birth</label>
            <input type="date" name="date_of_birth" class="form-control" value="{{ old('date_of_birth', $user->date_of_birth) }}">
        </div>

        <!-- Bio -->
        <div class="mb-3">
            <label for="bio" class="form-label">Bio</label>
            <textarea name="bio" class="form-control" rows="3">{{ old('bio', $user->bio) }}</textarea>
        </div>

        <!-- Submit -->
        <div class="d-flex justify-content-between">
            <button type="submit" class="btn btn-success">Save Changes</button>
            <a href="{{ route('user.profile.index') }}" class="btn btn-secondary">Cancel</a>
        </div>
    </form>
</div>
@endsection
