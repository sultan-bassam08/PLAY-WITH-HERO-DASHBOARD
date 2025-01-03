@extends('theme.master')

@section('content')
<div class="container">
    <h1>Edit Venue</h1>
    <form action="{{ route('admin.venues.update', $venue->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="name" class="form-label">Venue Name</label>
            <input type="text" class="form-control" id="name" name="name" value="{{ $venue->name }}" required>
        </div>
        <div class="mb-3">
            <label for="address" class="form-label">Address</label>
            <input type="text" class="form-control" id="address" name="address" value="{{ $venue->address }}" required>
        </div>
        <div class="mb-3">
            <label for="mobile" class="form-label">Contact Number</label>
            <input type="text" class="form-control" id="mobile" name="mobile" value="{{ $venue->mobile }}" required>
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control" id="email" name="email" value="{{ $venue->email }}" required>
        </div>
        <div class="mb-3">
            <label for="img_venue" class="form-label">Image</label>
            <input type="file" class="form-control" id="img_venue" name="img_venue" accept="image/*"> <!-- Updated to file input -->
            @if ($venue->img_venue)
                <div class="mt-2">
                    <img src="{{ asset('storage/' . $venue->img_venue) }}" alt="Venue Image" width="100">
                </div>
            @endif
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
    </form>
</div>
@endsection