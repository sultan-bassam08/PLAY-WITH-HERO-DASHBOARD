@extends('theme.master')

@section('content')
<h1>match Matches</h1>
<a href="{{ route('matches.create') }}" class="btn btn-success mb-3">Add match Match</a>
<table class="table">
    <thead>
        <tr>
            <th>#</th>
            <th>Date</th>
            <th>Venue</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($matches as $match)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $match->match_date_time }}</td>
                <td>
                    @php
                    $venue = $venues->firstWhere('id', $match->venueDescription->venue_info_id);
                @endphp
                    {{ $venue->name }}</td>
                <td>
                    <a href="{{ route('matches.edit', $match->id) }}" class="btn btn-primary btn-sm">Edit</a>
                    <form action="{{ route('matches.destroy', $match->id) }}" method="POST" style="display:inline;">
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
