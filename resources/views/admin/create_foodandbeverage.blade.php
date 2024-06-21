@extends('layouts.admin')

@section('content')
<h2>Create Food or Beverage</h2>
<form action="{{ route('admin.storeFoodAndBeverage') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="form-group">
        <label for="name">Name</label>
        <input type="text" class="form-control" id="name" name="name" required>
    </div>
    <div class="form-group">
        <label for="price">Price</label>
        <input type="number" class="form-control" id="price" name="price" required>
    </div>
    <div class="form-group">
        <label for="description">Description</label>
        <textarea class="form-control" id="description" name="description"></textarea>
    </div>
    <div class="form-group">
        <label for="stock">Stock</label>
        <input type="number" class="form-control" id="stock" name="stock" required>
    </div>
    <div class="form-group">
        <label for="mainpic">Main Pic</label>
        <input type="file" class="form-control" id="mainpic" name="mainpic" required>
    </div>
    <div class="form-group">
        <label for="type">Type</label>
        <select class="form-control" id="type" name="type" required>
            <option value="">Select Type</option>
            <option value="food">Food</option>
            <option value="drinks">Drink</option>
        </select>
    <button type="submit" class="btn btn-primary">Submit</button>
</form>
@endsection
