@extends('theme.master')

@section('title', 'Edit User')

@section('content')
<div class="container">
    <h1 class="mt-4">Edit User</h1>

    <!-- Display validation errors -->
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <!-- Edit User Form -->
    <form action="{{ route('users.update', $user->id) }}" method="POST">
        @csrf
        @method('PUT')

        <!-- Name Field -->
        <div class="mb-3">
            <label for="name" class="form-label">Name</label>
            <input type="text" name="name" id="name" class="form-control" 
                   value="{{ old('name', $user->name) }}" required>
        </div>

        <!-- Email Field -->
        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" name="email" id="email" class="form-control" 
                   value="{{ old('email', $user->email) }}" required>
        </div>

        <!-- Role Field -->
        <div class="mb-3">
            <label for="role_id" class="form-label">Role</label>
            <select name="role_id" id="role_id" class="form-select" required>
                @foreach ($roles as $role)
                    <option value="{{ $role->id }}" 
                        {{ $user->role_id == $role->id ? 'selected' : '' }}>
                        {{ $role->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <!-- Active Status Field -->
        <div class="mb-3">
            <label for="status" class="form-label">Status</label>
            <select name="status" id="status" class="form-select" required>
                <option value="1" {{ $user->status == 1 ? 'selected' : '' }}>Active</option>
                <option value="0" {{ $user->status == 0 ? 'selected' : '' }}>Inactive</option>
            </select>
        </div>

        <!-- Submit Button -->
        <button type="submit" class="btn btn-primary">Update User</button>
    </form>

    <!-- Back Button -->
    <a href="{{ route('users.index') }}" class="btn btn-secondary mt-3">Back to User List</a>
</div>
@endsection
