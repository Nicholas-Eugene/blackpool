@extends('layouts.admin')

@section('content')
    <h2>Sticks</h2>
    <table class="table table-striped table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Price</th>
                <th>Description</th>
                <th>Stock</th>
                <th>Main Pic</th>
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
                <td><img src="{{asset('storage/img/stick/'. $stick->mainpic) }}" alt="Main Pic"></td>
            </tr>
            @endforeach
        </tbody>
    </table>
@endsection
