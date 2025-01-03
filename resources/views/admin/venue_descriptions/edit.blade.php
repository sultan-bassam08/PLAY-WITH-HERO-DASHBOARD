@extends('theme.master')

@section('content')
<div class="container">
    <h1>Edit Venue Description</h1>
    <form action="{{ route('admin.venue_descriptions.update', $description->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="venue_info_id" class="form-label">Venue</label>
            <select class="form-control" id="venue_info_id" name="venue_info_id" required>
                @foreach ($venues as $venue)
                    <option value="{{ $venue->id }}" {{ $venue->id == $description->venue_info_id ? 'selected' : '' }}>{{ $venue->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="description" class="form-label">playground_description</label>
            <textarea class="form-control" id="playground_description" name="playground_description" required>{{ $description->playground_description }}</textarea>
        </div>
        <div class="mb-3">
            <label for="max_capacity" class="form-label">Max Capacity</label>
            <input type="number" class="form-control" id="max_spot" name="max_spot" value="{{ $description->max_spot }}" required>
        </div>
        <div class="mb-3">
            <label for="category_id" class="form-label">Category</label>
            <select class="form-control" id="category_id" name="category_id" required>
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}" {{ $category->id == $description->category_id ? 'selected' : '' }}>{{ $category->name }}</option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
    </form>
</div>
@endsection