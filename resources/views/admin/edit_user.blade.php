@extends('layouts.admin')

@section('content')
    <h2>Edit User</h2>
    <form action="{{ route('admin.updateUser', $user->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="username">Username</label>
            <input type="text" name="username" id="username" class="form-control" value="{{ $user->username }}" required>
        </div>

        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" name="email" id="email" class="form-control" value="{{ $user->email }}" required>
        </div>

        <div class="form-group">
            <label for="password">Password</label>
            <input type="password" name="password" id="password" class="form-control">
        </div>

        <div class="form-group">
            <label for="password_confirmation">Confirm Password</label>
            <input type="password" name="password_confirmation" id
            <input type="password" name="password_confirmation" id="password_confirmation" class="form-control">
        </div>

        <div class="form-group">
            <label for="is_admin">Admin Status</label>
            <select name="is_admin" id="is_admin" class="form-control" required>
                <option value="1" {{ $user->is_admin ? 'selected' : '' }}>True</option>
                <option value="0" {{ !$user->is_admin ? 'selected' : '' }}>False</option>
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Update User</button>
    </form>
@endsection
