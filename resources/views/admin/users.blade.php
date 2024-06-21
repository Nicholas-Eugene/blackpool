@extends('layouts.admin')

@section('content')
    <h2>Users</h2>
    <table class="table table-striped table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Username</th>
                <th>Email</th>
                <th>Profile Pic</th>
                <th>Admin</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($users as $user)
            <tr>
                <td>{{ $user->id }}</td>
                <td>{{ $user->username }}</td>
                <td>{{ $user->email }}</td>
                <td><img src="{{ $user->profilepic }}" alt="Profile Pic" width="50" height="50"></td>
                <td>{{ $user->is_admin ? 'Yes' : 'No' }}</td>
                <td>
                    <a href="{{ route('admin.editUser', $user->id) }}" class="btn btn-warning">Edit</a>
                    <form action="{{ route('admin.deleteUser', $user->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
@endsection
