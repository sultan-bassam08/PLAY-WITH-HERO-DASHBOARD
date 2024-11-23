@extends('theme.master')

@section('content')
<h1>Edit Role</h1>
<form action="{{ route('roles.update', $role->id) }}" method="POST">
    @csrf
    @method('PUT')
    <div class="mb-3">
        <label for="role_type" class="form-label">Role Type</label>
        <input type="text" class="form-control" id="role_type" name="role_type" value="{{ $role->role_type }}" required>
    </div>
    <button type="submit" class="btn btn-primary">Update</button>
</form>
@endsection
