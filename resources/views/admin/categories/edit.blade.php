@extends('theme.master')

@section('content')
<div class="container">
    <h2>Edit Category</h2>
    <form action="{{ route('admin.categories.update', $category->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label>Name</label>
            <input type="text" name="name" class="form-control" value="{{ $category->name }}" required>
        </div>
        <div class="form-group">
            <label>Current Image</label>
            <img src="{{ Storage::url($category->image_path) }}" alt="{{ $category->name }}" class="img-thumbnail mb-2" style="max-width: 200px">
            <input type="file" name="image" class="form-control">
        </div>
        <button type="submit" class="btn btn-primary mt-3">Update Category</button>
    </form>
</div>
@endsection
