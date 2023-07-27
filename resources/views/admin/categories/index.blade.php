
@extends('admin.layouts.master')
@section('main-content')
<div class="container-fluide">
    <div class="row">
    <h4>Category | <a href="{{ route('categories.create') }}">Add New</a></h4>
<div class="card bg-dark text-light">
    <div class="card-header">
        <h5> Category List</h5>
    </div>
    <div class="card-body">
        @if(session('success'))
        <div class="aleart aleart-success">{{ session('success') }}</div>
        @endif
        @if (session('error'))
        <div class="alert alert-danger">{{ session('error') }}</div>  
        @endif
   <table class="table table-bordered">
    <tr class="text-light bg-success">
        <th>ID</th>
        <th>Name</th>
        <th>Action</th>
    </tr>
  <tbody>
@foreach ($categories as $category)
<tr class="text-light">
<td>{{ $category->id }}</td>
<td>{{ $category->name }}</td>
<td>
    <a class="btn btn-sm btn-info" href="{{ route('categories.edit', $category->id) }}">Edit</a> |
    <form onsubmit="return confirm('Do you really want to delete this?');" class="d-inline" action="{{ route('categories.destroy', $category->id )}}" method="POST">
        @method('DELETE')
        @csrf
        <button type="submit" class="btn btn-sm btn-danger">Delete</button>
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