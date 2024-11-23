@extends('theme.master')
@section('content')
<h1>Create User</h1>
<form action="{{ route('users.store') }}" method="POST">
    @csrf
    <div class="mb-3">
        <label for="name" class="form-label">Name</label>
        <input type="text" class="form-control" id="name" name="name" required>
    </div>
    <div class="mb-3">
        <label for="email" class="form-label">Email</label>
        <input type="email" class="form-control" id="email" name="email" required>
    </div>
    <div class="mb-3">
        <label for="role_id" class="form-label">Role</label>
        <select class="form-control" id="role_id" name="role_id">
            @foreach ($roles as $role)
                <option value="{{ $role->id }}">{{ $role->role_type }}</option>
            @endforeach
        </select>
    </div>
    <button type="submit" class="btn btn-success">Submit</button>
</form>
@endsection
