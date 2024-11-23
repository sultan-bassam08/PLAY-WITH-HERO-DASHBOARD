@extends('theme.master')

@section('content')
<h1>Roles</h1>
<table class="table">
    <thead>
        <tr>
            <th>#</th>
            <th>Role Type</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($roles as $role)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $role->role_type }}</td>
                <td>
                    <a href="{{ route('roles.edit', $role->id) }}" class="btn btn-sm btn-primary">Edit</a>
                    <form action="{{ route('roles.destroy', $role->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
@endsection
