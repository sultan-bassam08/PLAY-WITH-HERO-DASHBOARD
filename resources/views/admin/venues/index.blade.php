@extends('theme.master')

@section('content')
<h1>Venues</h1>
<a href="{{ route('venues.create') }}" class="btn btn-success mb-3">Add Venue</a>
<table class="table">
    <thead>
        <tr>
            <th>#</th>
            <th>Name</th>
            <th>Location</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($venues as $venue)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $venue->name }}</td>
                <td>{{ $venue->location }}</td>
                <td>
                    <a href="{{ route('venues.edit', $venue->id) }}" class="btn btn-primary btn-sm">Edit</a>
                    <form action="{{ route('venues.destroy', $venue->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
@endsection
