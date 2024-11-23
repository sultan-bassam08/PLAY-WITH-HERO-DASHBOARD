@extends('theme.master')

@section('content')
<h1>Edit Venue</h1>
<form action="{{ route('venues.update', $venue->id) }}" method="POST">
    @csrf
    @method('PUT')
    <div class="mb-3">
        <label for="name" class="form-label">Venue Name</label>
        <input type="text" class="form-control" id="name" name="name" value="{{ $venue->name }}" required>
    </div>
    <div class="mb-3">
        <label for="location" class="form-label">Location</label>
        <input type="text" class="form-control" id="location" name="location" value="{{ $venue->location }}" required>
    </div>
    <button type="submit" class="btn btn-primary">Update</button>
</form>
@endsection
