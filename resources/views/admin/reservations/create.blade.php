@extends('theme.master')

@section('content')
    <div class="card">
        <div class="card-header">
            <h3>Add New Reservation</h3>
        </div>
        <div class="card-body">
            <form action="{{ route('reservations.store') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="user_id" class="form-label">User</label>
                    <select name="user_id" id="user_id" class="form-control" required>
                        <option value="">-- Select User --</option>
                        @foreach ($users as $user)
                            <option value="{{ $user->id }}">{{ $user->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-3">
                    <label for="match_id" class="form-label">Match</label>
                    <select name="match_id" id="match_id" class="form-control" required>
                        <option value="">-- Select Match --</option>
                        @foreach ($matches as $match)
                            <option value="{{ $match->id }}">{{ $match->title }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-3">
                    <label for="date" class="form-label">Reservation Date</label>
                    <input type="date" name="date" id="date" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label for="time" class="form-label">Reservation Time</label>
                    <input type="time" name="time" id="time" class="form-control" required>
                </div>
                <button type="submit" class="btn btn-success">Add Reservation</button>
            </form>
        </div>
    </div>
@endsection
