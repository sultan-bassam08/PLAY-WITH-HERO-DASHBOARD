@extends('theme.master')

@section('content')
<h1>Add Venue</h1>
<form action="{{ route('venues.store') }}" method="POST">
    @csrf
    <div class="mb-3">
        <label for="name" class="form-label">Venue Name</label>
        <input type="text" class="form-control" id="name" name="name" required>
    </div>
    <div class="mb-3">
        <label for="location" class="form-label">Location</label>
        <input type="text" class="form-control" id="location" name="location" required>
    </div>
    <button type="submit" class="btn btn-success">Submit</button>
</form>
@endsection
