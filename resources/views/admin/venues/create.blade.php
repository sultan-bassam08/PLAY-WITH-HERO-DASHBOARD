@extends('theme.master')

@section('content')
<div class="container">
    <h1>Add Venue</h1>
    <form action="{{ route('admin.venues.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label for="name" class="form-label">Venue Name</label>
            <input type="text" class="form-control" id="name" name="name" required>
        </div>
        <div class="mb-3">
            <label for="address" class="form-label">Address</label>
            <input type="text" class="form-control" id="address" name="address" required>
        </div>
        <div class="mb-3">
            <label for="mobile" class="form-label">Contact Number</label>
            <input type="text" class="form-control" id="mobile" name="mobile" required>
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control" id="email" name="email" required>
        </div>
        <div class="mb-3">
            <label for="img_venue" class="form-label">Image</label>
            <input type="file" class="form-control" id="img_venue" name="img_venue" accept="image/*" required>
        </div>
        <button type="submit" class="btn btn-success">Submit</button>
    </form>
</div>
@endsection