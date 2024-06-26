@extends('layouts.admin')

@section('content')
    <h2>Sticks</h2>
    <a href="{{ route('admin.createStick') }}" class="btn btn-primary">Add New Stick</a>
    <table class="table table-striped table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Price</th>
                <th>Description</th>
                <th>Stock</th>
                <th>Main Pic</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($sticks as $stick)
            <tr>
                <td>{{ $stick->id }}</td>
                <td>{{ $stick->name }}</td>
                <td>{{ $stick->price }}</td>
                <td>{{ $stick->description }}</td>
                <td>{{ $stick->stock }}</td>
                <td><img src="{{ asset($stick->mainpic) }}" alt="Main Pic" style="width: 100px;"></td>
                <td>
                    <a href="{{ route('admin.editStick', $stick->id) }}" class="btn btn-primary">Edit</a>
                    <form action="{{ route('admin.deleteStick', $stick->id) }}" method="POST" style="display:inline-block;">
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
 