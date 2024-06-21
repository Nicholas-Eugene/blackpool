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
            </tr>
        </thead>
        <tbody>
            @foreach ($users as $user)
            <tr>
                <td>{{ $user->id }}</td>
                <td>{{ $user->username }}</td>
                <td>{{ $user->email }}</td>
                <td><img src="{{ $user->profilepic }}" alt="Profile Pic"></td>
                <td>{{ $user->is_admin ? 'Yes' : 'No' }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
@endsection
