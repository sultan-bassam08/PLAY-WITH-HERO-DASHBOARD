@extends('theme.master')

@section('content')
<div class="container">
    <h1>Add Game Match</h1>
    <form action="{{ route('admin.matches.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="match_date" class="form-label">Match Date</label>
            <input type="datetime-local" class="form-control" name="match_date" required>
        </div>

        <div class="mb-3">
            <label for="game_duration" class="form-label">Game Duration (minutes)</label>
            <input type="number" class="form-control" name="game_duration" required>
        </div>

        <div class="mb-3">
            <label for="status" class="form-label">Status</label>
            <select class="form-select" name="status" required>
                <option value="available">Available</option>
                <option value="pending">Pending</option>
                <option value="booked">Booked</option>
                <option value="completed">Completed</option>
            </select>
        </div>

        <div class="mb-3">
            <label for="venue_id" class="form-label">Venue</label>
            <select class="form-select" name="venue_id" required>
                @foreach ($venues as $venue)
                    <option value="{{ $venue->id }}">{{ $venue->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="description" class="form-label">Description</label>
            <textarea class="form-control" name="description" rows="3"></textarea>
        </div>

        <button type="submit" class="btn btn-success">Create Match</button>
    </form>
</div>
@endsection