@extends('layouts.admin')

@section('content')
<h2>Edit Food or Beverage</h2>
<form action="{{ route('admin.updateFoodAndBeverage', $foodAndBeverage->id) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <div class="form-group">
        <label for="name">Name</label>
        <input type="text" class="form-control" id="name" name="name" value="{{ $foodAndBeverage->name }}" required>
    </div>
    <div class="form-group">
        <label for="price">Price</label>
        <input type="number" class="form-control" id="price" name="price" value="{{ $foodAndBeverage->price }}" required>
    </div>
    <div class="form-group">
        <label for="description">Description</label>
        <textarea class="form-control" id="description" name="description">{{ $foodAndBeverage->description }}</textarea>
    </div>
    <div class="form-group">
        <label for="stock">Stock</label>
        <input type="number" class="form-control" id="stock" name="stock" value="{{ $foodAndBeverage->stock }}" required>
    </div>
    <div class="form-group">
        <label for="mainpic">Main Pic</label>
        <input type="file" class="form-control" id="mainpic" name="mainpic">
        @if ($foodAndBeverage->mainpic)
            <img src="{{ Storage::url($foodAndBeverage->mainpic) }}" alt="Main Pic" width="100">
        @endif
    </div>
    <div class="form-group">
        <label for="type">Type</label>
        <select class="form-control" id="type" name="type" required>
            <option value="">Select Type</option>
            <option value="food" {{ $foodAndBeverage->type == 'Food' ? 'selected' : '' }}>Food</option>
            <option value="drinks" {{ $foodAndBeverage->type == 'Drink' ? 'selected' : '' }}>Drink</option>
        </select>
    </div>

    <button type="submit" class="btn btn-primary">Update</button>
</form>
@endsection
