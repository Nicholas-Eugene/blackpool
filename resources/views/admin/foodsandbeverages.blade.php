@extends('layouts.admin')

@section('content')
    <h2>Food and Beverages</h2>
    <table class="table table-striped table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Price</th>
                <th>Description</th>
                <th>Stock</th>
                <th>Main Pic</th>
                <th>Type</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($foodsAndBeverages as $item)
            <tr>
                <td>{{ $item->id }}</td>
                <td>{{ $item->name }}</td>
                <td>{{ $item->price }}</td>
                <td>{{ $item->description }}</td>
                <td>{{ $item->stock }}</td>
                <td><img src="{{ $item->mainpic }}" alt="Main Pic"></td>
                <td>{{ $item->type }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
@endsection
