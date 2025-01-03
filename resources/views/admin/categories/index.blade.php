<!-- index.blade.php -->
@extends('theme.master')

@section('content')
<div class="container">
    <h2>Categories</h2>
    <a href="{{ route('admin.categories.create') }}" class="btn btn-primary mb-3">Add New Category</a>

    <div class="row">
    @foreach($categories as $category)
    <div class="col-md-4 mb-4">
        <div class="card">
            <img src="{{ asset('storage/' . $category->image_path) }}" class="card-img-top" alt="{{ $category->name }}">
            <div class="card-body">
                <h5 class="card-title">{{ $category->name }}</h5>
                <div class="btn-group">
                    <a href="{{ route('admin.categories.edit', $category) }}" class="btn btn-primary">Edit</a>
                    <form action="{{ route('admin.categories.destroy', $category) }}" method="POST" class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    @endforeach
</div>
</div>
@endsection
