@extends('theme.master')

@section('content')
<div class="container">
    <h1>Venue Description Details</h1>
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">{{ $description->venueInfo->name }}</h5>
            <p class="card-text"><strong>Description:</strong> {{ $description->playground_description }}</p>
            <p class="card-text"><strong>Max Capacity:</strong> {{ $description->max_spot }}</p>
            <p class="card-text"><strong>Category:</strong> {{ $description->category->name }}</p>
            <a href="{{ route('admin.venue_descriptions.edit', $description->id) }}" class="btn btn-primary">Edit</a>
            <form action="{{ route('admin.venue_descriptions.destroy', $description->id) }}" method="POST" style="display:inline;">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this description?')">Delete</button>
            </form>
        </div>
    </div>
</div>
@endsection