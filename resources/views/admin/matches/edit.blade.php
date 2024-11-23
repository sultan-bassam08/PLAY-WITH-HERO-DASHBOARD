@extends('theme.master')

@section('content')
<h1>Edit Game Match</h1>
<form action="{{ route('matches.update', $match->id) }}" method="POST">
    @csrf
    @method('PUT')
    <div class="mb-3">
        <label for="match_date" class="form-label">Match Date</label>
        <input type="date" class="form-control" id="match_date" name="match_date" value="{{ $match->match_date }}" required>
    </div>
    <div class="mb-3">
        <label for="venue_id" class="form-label">Venue</label>
        <select class="form-select" id="venue_id" name="venue_id" required>
            @foreach ($venues as $venue)
                <option value="{{ $venue->id }}" {{ $venue->id == $match->venue_id ? 'selected' : '' }}>
                    {{ $venue->name }}
                </option>
            @endforeach
        </select>
    </div>
    <button type="submit" class="btn btn-primary">Update</button>
</form>
@endsection
