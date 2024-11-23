@extends('theme.master')

@section('content')
<h1>Add Game Match</h1>
<form action="{{ route('matches.store') }}" method="POST">
    @csrf
    <div class="mb-3">
        <label for="match_date" class="form-label">Match Date</label>
        <input type="date" class="form-control" id="match_date" name="match_date" required>
    </div>
    <div class="mb-3">
        <label for="venue_id" class="form-label">Venue</label>
        <select class="form-select" id="venue_id" name="venue_id" required>
            @foreach ($venues as $venue)
                <option value="{{ $venue->id }}">{{ $venue->name }}</option>
            @endforeach
        </select>
    </div>
    <button type="submit" class="btn btn-success">Submit</button>
</form>
@endsection
