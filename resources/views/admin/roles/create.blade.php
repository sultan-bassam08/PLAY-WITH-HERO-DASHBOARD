@extends('theme.master')

@section('content')
<h1>Create Role</h1>
<form action="{{ route('roles.store') }}" method="POST">
    @csrf
    <div class="mb-3">
        <label for="role_type" class="form-label">Role Type</label>
        <input type="text" class="form-control" id="role_type" name="role_type" required>
    </div>
    <button type="submit" class="btn btn-success">Submit</button>
</form>
@endsection
