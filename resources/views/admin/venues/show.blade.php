@extends('theme.master')

@section('content')
<div class="container">
    <h1>Venue Details</h1>
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">{{ $venue->name }}</h5>
            <p class="card-text"><strong>Address:</strong> {{ $venue->address }}</p>
            <p class="card-text"><strong>Contact Number:</strong> {{ $venue->mobile }}</p>
            <p class="card-text"><strong>Email:</strong> {{ $venue->email }}</p>
            <p class="card-text"><strong>Image URL:</strong> {{ $venue->img_venue }}</p>
            <a href="{{ route('admin.venues.edit', $venue->id) }}" class="btn btn-primary">Edit</a>
            <form action="{{ route('admin.venues.destroy', $venue->id) }}" method="POST" style="display:inline;">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this venue?')">Delete</button>
            </form>
        </div>
    </div>
</div>
@endsection