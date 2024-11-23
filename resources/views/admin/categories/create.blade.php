@extends('theme.master')

@section('content')
<h1>Add Category</h1>
<form action="{{ route('categories.store') }}" method="POST">
    @csrf
    <div class="mb-3">
        <label for="name" class="form-label">Category Name</label>
        <input type="text" class="form-control" id="name" name="name" required>
    </div>
    <button type="submit" class="btn btn-success">Submit</button>
</form>
@endsection
