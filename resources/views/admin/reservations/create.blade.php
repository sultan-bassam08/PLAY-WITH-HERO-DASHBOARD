@extends('theme.master')

@section('content')
<div class="card">
    <div class="card-header">
        <h3>Add New Reservation</h3>
    </div>
    <div class="card-body">
        <form action="{{ route('admin.reservations.store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="user_id" class="form-label">User</label>
                <select name="user_id" class="form-control" required>
                    <option value="">Select User</option>
                    @foreach ($users as $user)
                        <option value="{{ $user->id }}">{{ $user->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label for="match_id" class="form-label">Match</label>
                <select name="match_id" class="form-control" required>
                    <option value="">Select Match</option>
                    @foreach ($matches as $match)
                        <option value="{{ $match->id }}">
                            {{ $match->match_date_time->format('Y-m-d H:i') }} - 
                            {{ $match->venueDescription->venueInfo->name }}
                        </option>
                    @endforeach
                </select>
            </div>

            <button type="submit" class="btn btn-success">Create Reservation</button>
        </form>
    </div>
</div>
@endsection