@extends('theme.master')

@section('content')
<div class="container">
    <h1>Venue Descriptions</h1>
    <a href="{{ route('admin.venue_descriptions.create') }}" class="btn btn-success mb-3">Add Venue Description</a>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>#</th>
                <th>Venue</th>
                <th>Description</th>
                <th>Max Capacity</th>
                <th>Category</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($descriptions as $description)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $description->venueInfo->name }}</td>
                    <td>{{ $description->playground_description }}</td> <!-- Updated to 'playground_description' -->
                    <td>{{ $description->max_spot }}</td> <!-- Updated to 'max_spot' -->
                    <td>{{ $description->category->name }}</td>
                    <td>
                        <div class="d-flex">
                            <a href="{{ route('admin.venue_descriptions.edit', $description->id) }}" class="btn btn-primary btn-sm me-2">Edit</a>
                            <form action="{{ route('admin.venue_descriptions.destroy', $description->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this description?')">Delete</button>
                            </form>
                        </div>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    {{ $descriptions->links('pagination::bootstrap-5') }}
</div>

@endsection