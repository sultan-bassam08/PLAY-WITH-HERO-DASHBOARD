@extends('theme.master')

@section('content')
<div class="card">
    <div class="card-header">
        <h3>Edit Reservation</h3>
    </div>
    <div class="card-body">
        <form action="{{ route('admin.reservations.update', $reservation) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="user_id" class="form-label">User</label>
                <select name="user_id" class="form-control" required>
                    <option value="">Select User</option>
                    @foreach ($users as $user)
                        <option value="{{ $user->id }}" {{ $reservation->user_id == $user->id ? 'selected' : '' }}>
                            {{ $user->name }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label for="match_id" class="form-label">Match</label>
                <select name="match_id" class="form-control" required>
                    <option value="">Select Match</option>
                    @foreach ($matches as $match)
                        <option value="{{ $match->id }}" {{ $reservation->match_id == $match->id ? 'selected' : '' }}>
                            {{ $match->match_date_time->format('Y-m-d H:i') }} - 
                            {{ $match->venueDescription->venueInfo->name }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label for="reservation_status" class="form-label">Status</label>
                <select name="reservation_status" class="form-control" required>
                    @foreach(['waiting', 'confirmed', 'declined', 'completed'] as $status)
                        <option value="{{ $status }}" {{ $reservation->reservation_status == $status ? 'selected' : '' }}>
                            {{ ucfirst($status) }}
                        </option>
                    @endforeach
                </select>
            </div>

            <button type="submit" class="btn btn-primary">Update Reservation</button>
        </form>
    </div>
</div>
@endsection