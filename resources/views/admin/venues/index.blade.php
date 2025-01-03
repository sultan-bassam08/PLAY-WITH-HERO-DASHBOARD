@extends('theme.master')

@section('content')
<h1>Venues</h1>
<a href="{{ route('admin.venues.create') }}" class="btn btn-success mb-3">Add Venue</a>
<table class="table">
    <thead>
        <tr>
            <th>#</th>
            <th>Name</th>
            <th>Address</th>
            <th>Contact Number</th>
            <th>Email</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($venues as $venue)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $venue->name }}</td>
                <td>{{ $venue->address }}</td>
                <td>{{ $venue->mobile }}</td> <!-- Updated to 'mobile' -->                <td>{{ $venue->email }}</td>
                <td>
                    <div class="d-flex">
                        <a href="{{ route('admin.venues.edit', $venue->id) }}" class="btn btn-primary btn-sm me-2">Edit</a>
                        <form action="{{ route('admin.venues.destroy', $venue->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this venue?')">Delete</button>                        </form>
                    </div>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
{{ $venues->links('pagination::bootstrap-5') }}
@endsection