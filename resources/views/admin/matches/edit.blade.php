@extends('theme.master')

@section('content')
<div class="container">
    <h1>Edit Game Match</h1>
    <form action="{{ route('admin.matches.update', $match) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="match_date" class="form-label">Match Date</label>
            <input type="datetime-local" class="form-control" name="match_date" 
                   value="{{ $match->match_date_time->format('Y-m-d\TH:i') }}" required>
        </div>

        <div class="mb-3">
            <label for="game_duration" class="form-label">Game Duration (minutes)</label>
            <input type="number" class="form-control" name="game_duration" 
                   value="{{ $match->game_duration }}" required>
        </div>

        <div class="mb-3">
            <label for="status" class="form-label">Status</label>
            <select class="form-select" name="status" required>
                @foreach(['available', 'pending', 'booked', 'completed'] as $status)
                    <option value="{{ $status }}" {{ $match->status == $status ? 'selected' : '' }}>
                        {{ ucfirst($status) }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="venue_id" class="form-label">Venue</label>
            <select class="form-select" name="venue_id" required>
                @foreach ($venues as $venue)
                    <option value="{{ $venue->id }}" 
                            {{ $venue->id == $match->venueDescription->venue_info_id ? 'selected' : '' }}>
                        {{ $venue->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="description" class="form-label">Description</label>
            <textarea class="form-control" name="description" rows="3">{{ $match->description }}</textarea>
        </div>

        <button type="submit" class="btn btn-primary">Update Match</button>
    </form>
</div>
@endsection