@extends('admin.layouts.master')
@section('main-content')
<div class="container-fluide">
<div class="row">
<h3>Add Product</h3>
<br>
<br>
<div class="col">
<div class="card bg-dark text-light">
<div class="card-header">
  <h5 class="mt-0 d-flex justify-content-center">Create Product</h5>
</div>
<div class="card-body">
    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    @if (session('error'))
        <div class="alert alert-danger">{{ session('error') }}</div>
    @endif
    <div class="row d-flex justify-content-center">
        <div class="col-md-6">
            <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="name">Name:</label>
                    <input type="text" name="name" id="name" class="form-control">
                    @error('name')
                        <p class="text-danger mt-1">{{ $message }}</p>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="category_id">Category:</label>
                    <select name="category_id" class="form-control">
                        <option value="">--Choose Category--</option>
                        @foreach ($categories as $category)
                         <option value="{{ $category->id }}">{{ $category->name }}</option>
                        @endforeach
                    </select>
                  @error('category_id')
                      <p class="text-danger mt-1"> {{ $message }}</p> 
                  @enderror
                </div>
                <div class="form-group">
                  <label for="price">Price:</label>
                  <input type="text" name="price" id="price" class="form-control">
                  @error('price')
                      <p class="text-danger mt-1">{{ $message }}</p>
                  @enderror 
                </div>
                <div class="form-group">
                    <label for="quantity">Quantity:</label>
                    <input type="text" name="quantity" id="quantity" class="form-control">
                    @error('error')
                        <p class="text-danger mt-1">{{ $message }}</p>
                    @enderror
                </div>
                <div class="form-group">
                  <label for="image">Image:</label>
                  <input type="file" name="image" id="image" class="form-control">
                  @error('image')
                      <p class="text-danger mt-1">{{ $message }}
                  @enderror
                </div>
                <div class="form-group">
                    <label for="description">Description:</label><br>
                    <textarea name="description" id="description" class="form-control"></textarea>
                    @error('description')
                        <p class="text-danger mt-1">{{ $message }}</p>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="status">Status:</label>
                    <select name="status" id="status" class="form-control">
                      <option value="1">Active</option>
                      <option value="0">In Active</option>
                    </select>
                  @error('status')
                      <p class="taxt-danger mt-1">{{ $message }}</p>
                  @enderror
                </div>
                <br>
                <div class="form-group">
                    <input class="btn btn-primary form-control" type="submit" value="Save">
                </div>
            </form>
        </div>
    </div>
</div>
</div>
</div>
</div>
</div>
@endsection