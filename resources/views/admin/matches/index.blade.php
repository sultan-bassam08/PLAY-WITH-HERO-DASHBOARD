@extends('theme.master')

@section('content')
<div class="container">
    <h1>Manage Matches</h1>
    <a href="{{ route('admin.matches.create') }}" class="btn btn-success mb-3">Add New Match</a>
    
    <div class="table-responsive">
        <table class="table">
            <thead>
                <tr>
                    <th>Date & Time</th>
                    <th>Venue</th>
                    <th>Category</th>
                    <th>Duration</th>
                    <th>Status</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($matches as $match)
                <tr>
                    <td>{{ $match->match_date_time->format('Y-m-d H:i') }}</td>
                    <td>{{ $match->venueDescription->venueInfo->name }}</td>
                    <td>{{ $match->category->name }}</td>
                    <td>{{ $match->game_duration }} min</td>
                    <td>{{ ucfirst($match->status) }}</td>
                    <td>
                        <a href="{{ route('admin.matches.edit', $match) }}" class="btn btn-primary btn-sm">Edit</a>
                        <form action="{{ route('admin.matches.destroy', $match) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" 
                            onclick="return confirm('Are you sure?')">Delete</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    
    {{ $matches->links('pagination::bootstrap-5') }}
</div>
@endsection
