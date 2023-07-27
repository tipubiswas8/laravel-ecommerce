@extends('admin.layouts.master')
@section('main-content')
<div class="container-fluid">
<div class="row">
    <div class="content-header">
      <h4>Products | <a href="{{ route('products.create') }}">Add New</a></h4>
    </div>
<div class="card bg-dark text-light">
  <div class="card-header">
     <h5>Product List</h5>
  </div>
  <div class="card-body">
@if (session('success'))
  <div class="alert alert-success">{{ session('success') }}</div>
@endif
@if (session('error'))
  <div class="alert alert-danger">{{ session('error') }}</div>
@endif
<table class="table table-bordered text-light">
<tr>
  <th>ID</th>
  <th>Name</th>
  <th>Category</th>
  <th>Price</th>
  <th>Quantity</th>
  <th>Status</th>
  <th>Action</th>
</tr>
<tbody>
@foreach ($products as $product)
  <tr>
<td>#{{ $product->id }}</td>
<td>{{ $product->name }}</td>
<td>{{ $product->productCategory->name }}</td>
{{-- <td>{{ $product->category_id }}</td> --}}
<td>{{ $product->price }}</td>
<td>{{ $product->quantity }}</td>
<td>{{ $product->status }}</td>
<td>
<a class="btn btn-sm btn-info" href="{{ route('products.edit', $product->id) }}">Edit</a>
<form action="{{ route('products.destroy', $product->id) }}" method="POST" class="d-inline">
  @method('delete')
  @csrf
  <button class="btn btn-sm btn-danger" type="submit">Delete</button>
</form>
</td>
  </tr>
@endforeach
</tbody>
</table>
  </div>
</div>
</div>
</div>
@endsection