@extends('theme.master')

@section('content')
    <div class="card mb-4">
        <div class="card-header">
            <h3>Reservations</h3>
            <a href="{{ route('reservations.create') }}" class="btn btn-success float-end">Add Reservation</a>
        </div>
        <div class="card-body">
            <table class="table">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>User</th>
                        <th>Venue</th>
                        <th>Date</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($reservations as $reservation)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $reservation->user->name }}</td>
                            <td>{{ $reservation->venue->name }}</td>
                            <td>{{ $reservation->date }}</td>
                            <td>
                                <a href="{{ route('reservations.edit', $reservation->id) }}" class="btn btn-primary btn-sm">Edit</a>
                                <form action="{{ route('reservations.destroy', $reservation->id) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
