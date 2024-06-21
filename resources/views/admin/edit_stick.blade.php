@extends('layouts.admin')

@section('content')
<h2>Edit Stick</h2>
<form action="{{ route('admin.updateStick', $stick->id) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <div class="form-group">
        <label for="name">Name</label>
        <input type="text" class="form-control" id="name" name="name" value="{{ $stick->name }}" required>
    </div>
    <div class="form-group">
        <label for="price">Price</label>
        <input type="number" class="form-control" id="price" name="price" value="{{ $stick->price }}" required>
    </div>
    <div class="form-group">
        <label for="description">Description</label>
        <textarea class="form-control" id="description" name="description">{{ $stick->description }}</textarea>
    </div>
    <div class="form-group">
        <label for="stock">Stock</label>
        <input type="number" class="form-control" id="stock" name="stock" value="{{ $stick->stock }}" required>
    </div>
    <div class="form-group">
        <label for="mainpic">Main Pic</label>
        <input type="file" class="form-control" id="mainpic" name="mainpic">
        @if($stick->mainpic)
            <img src="{{ asset($stick->mainpic) }}" alt="{{ $stick->name }}" width="100">
        @endif
    </div>
    <div class="form-group">
        <label for="pic2">Additional Pic 2</label>
        <input type="file" class="form-control" id="pic2" name="pic2">
        @if($stick->pic2)
            <img src="{{ asset($stick->pic2) }}" alt="{{ $stick->name }}" width="100">
        @endif
    </div>
    <div class="form-group">
        <label for="pic3">Additional Pic 3</label>
        <input type="file" class="form-control" id="pic3" name="pic3">
        @if($stick->pic3)
            <img src="{{ asset($stick->pic3) }}" alt="{{ $stick->name }}" width="100">
        @endif
    </div>
    <div class="form-group">
        <label for="pic4">Additional Pic 4</label>
        <input type="file" class="form-control" id="pic4" name="pic4">
        @if($stick->pic4)
            <img src="{{ asset($stick->pic4) }}" alt="{{ $stick->name }}" width="100">
        @endif
    </div>
    <button type="submit" class="btn btn-primary">Update</button>
</form>
@endsection
