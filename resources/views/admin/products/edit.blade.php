@extends('admin.layouts.master')
@section('main-content')
<div class="container-fluid">
  <div class="row d-flex justify-content-center">
    <h3 class="m-0">Edit Product</h3>
<div class="card bg-dark text-light">
<div class="card-header">
<h4>Edit Product</h4>
</div>
<div class="card-body">
  @if(session('success'))
  <div class="alert alert-success">{{ session('success') }}</div>
@endif
@if(session('error'))
  <div class="alert alert-danger">{{ session('error') }}</div>
@endif
<div class="row">
<form action="{{ route('products.update', $product->id) }}" method="POST" enctype="multipart/form-data">
@method('PUT')
@csrf
<div class="form-group">
<label for="name">Name:</label>
<input type="text" id="name" name="name" value="{{ $product->name }}" class="form-control">
@error('name')
  <p class="text-danger mt-1">{{ $message }}</p>  
@enderror
</div>
<div class="form-group">
    <label for="category">Category:</label>
    <select name="category_id" id="category" class="form-control">
      @foreach($categories as $category)
      <option value="{{ $category->id }}" {{ $category->id == $product->category_id ? 'selected' : '' }}>{{ $category->name }}</option>
      @endforeach
    </select>
</div>
<div class="form-group">
  <label for="price">Price:</label>
  <input type="text" id="price" name="price" value="{{ $product->price }}" class="form-control">
  @error('price')
  <p class="text-danger mt-1">{{ $message }}</p>
  @enderror
</div>
<div class="form-group">
  <label for="quantity">Quantity</label>
  <input type="text" name="quantity" id="quantity" value="{{ $product->quantity }}" class="form-control">
  @error('quantity')
<p class="text-danger mt-1">{{ $message }}
  @enderror
</div>
<div class="form-group">
  <label for="image">Image:</label>
  <input type="file" name="image" id="image" class="form-control">
  @error('image')
    <p class="text-danger mt-1">{{ $message }}</p>
  @enderror
  <br>
  <img width="100" height="100" src="{{ asset($product->image) }}" alt="">
</div>
<div class="form-group">
  <label for="description">Description:</label>
  <textarea name="description" id="description" class="form-control">{{ $product->description }}</textarea>
  @error('description')
    <p class="text-danger mt-1">{{ $message }}</p>
  @enderror
</div>
<div class="form-group">
<label for="status">Status:</label>
<select name="status" id="status" class="form-control">
  <option value="1" {{ $product->status == 1 ? 'selected':'' }}>Active</option>
  <option value="0" {{ $product->status == 0 ? 'selected':'' }}>In Active</option>
</select>
@error('status')
  <p class="text-danger mt-1">{{ $message }}</p>
@enderror
</div>
<br>
<div class="form-group">
  <input class="btn btn-primary form-control" type="submit" value="Update">
</div>

</form>
</div>
</div>
</div>
</div>
</div>
@endsection