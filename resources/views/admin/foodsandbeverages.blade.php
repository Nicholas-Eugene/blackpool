@extends('layouts.admin')

@section('content')
<h2>Food and Beverages</h2>
<a href="{{ route('admin.createFoodAndBeverage') }}" class="btn btn-primary">Add New Food or Beverage</a>
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
            <th>Actions</th>
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
            <td><img src="{{ asset('' . $item->mainpic) }}" alt="Main Pic" width="100"></td>
            <td>{{ $item->type }}</td>
            <td>
                <a href="{{ route('admin.editFoodAndBeverage', $item->id) }}" class="btn btn-warning">Edit</a>
                <form action="{{ route('admin.deleteFoodAndBeverage', $item->id) }}" method="POST" style="display:inline-block;">
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
