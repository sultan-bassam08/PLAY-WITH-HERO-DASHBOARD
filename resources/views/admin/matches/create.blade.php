@extends('theme.master')

@section('content')
<h1>Add Game Match</h1>
<form action="{{ route('matches.store') }}" method="POST">
    @csrf
    <div class="mb-3">
        <label for="match_date" class="form-label">Match Date</label>
        <input type="date" class="form-control" id="datePicker" name="match_date" required>
    </div>
    <div class="mb-3">
        <label for="game_duration" class="form-label">Game Duration</label>
        <input type="number" class="form-control" id="game_duration" name="game_duration" required>
    </div>
    <div class="mb-3">
        <label for="status" class="form-label">status</label>
        <input type="text" class="form-control" id="status" name="status" required>
    </div>
    <div class="mb-3">
        <label for="venue_id" class="form-label">Venue</label>
        <select name="venue_id" class="form-select" id="venue_id" name="venue_id">
            @foreach ($venues as $venue )
                <option X value="{{ $venue->id }}">{{ $venue->name }}</option>
            @endforeach
        </select>
    </div>
    <button type="submit" class="btn btn-success">Submit</button>
</form>
@endsection
