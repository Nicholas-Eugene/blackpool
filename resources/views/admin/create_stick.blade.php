@extends('layouts.admin')

@section('content')
<h2>Create Stick</h2>
<form action="{{ route('admin.storeStick') }}" method="POST" enctype="multipart/form-data">
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
        <label for="pic2">Additional Pic 2</label>
        <input type="file" class="form-control" id="pic2" name="pic2">
    </div>
    <div class="form-group">
        <label for="pic3">Additional Pic 3</label>
        <input type="file" class="form-control" id="pic3" name="pic3">
    </div>
    <div class="form-group">
        <label for="pic4">Additional Pic 4</label>
        <input type="file" class="form-control" id="pic4" name="pic4">
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
</form>
@endsection
