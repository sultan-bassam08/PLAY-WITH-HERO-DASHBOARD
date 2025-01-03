@extends('theme.master')

@section('content')
<div class="card">
    <div class="card-header d-flex justify-content-between align-items-center">
        <h3>Reservations</h3>
        <a href="{{ route('admin.reservations.create') }}" class="btn btn-primary">Create Reservation</a>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>User</th>
                        <th>Match Date</th>
                        <th>Venue</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($reservations as $reservation)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $reservation->user->name }}</td>
                            <td>{{ $reservation->match->match_date_time->format('Y-m-d H:i') }}</td>
                            <td>{{ $reservation->match->venueDescription->venueInfo->name }}</td>
                            <td>{{ ucfirst($reservation->reservation_status) }}</td>
                            <td>
                                <a href="{{ route('admin.reservations.edit', $reservation) }}" 
                                   class="btn btn-primary btn-sm">Edit</a>
                                <form action="{{ route('admin.reservations.destroy', $reservation) }}" 
                                      method="POST" class="d-inline">
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
            {{ $reservations->links('pagination::bootstrap-5') }}
        </div>
    </div>
</div>
@endsection