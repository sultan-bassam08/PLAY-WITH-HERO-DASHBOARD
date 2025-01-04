@extends('theme.master')

@section('content')
<div class="container">
    <h1>Add Venue Description</h1>
    <form action="{{ route('admin.venue_descriptions.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="venue_info_id" class="form-label">Venue</label>
            <select class="form-control" id="venue_info_id" name="venue_info_id" required>
                @foreach ($venues as $venue)
                    <option value="{{ $venue->id }}">{{ $venue->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="playground_description" class="form-label">Description</label>
            <textarea class="form-control" id="playground_description" name="playground_description" required></textarea>
        </div>
        <div class="mb-3">
            <label for="max_spot" class="form-label">Max Capacity</label>
            <input type="number" class="form-control" id="max_spot" name="max_spot" required>
        </div>
        <div class="mb-3">
            <label for="category_id" class="form-label">Category</label>
            <select class="form-control" id="category_id" name="category_id" required>
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-success">Submit</button>
    </form>
</div>
@endsection