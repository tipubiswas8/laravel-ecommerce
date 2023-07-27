@extends('admin.layouts.master');
@section('main-content');
<div class="container-fluide">
<div class="container-header">
    <h4>Edit Category</h4>
</div>
<div class="card bg-dark text-light">
<div class="card-header">
    <h5>Edit Category</h5>
</div>
<div class="card-body">
    @if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    @if(session('error'))
    <div class="alert alert-danger">{{ session('error') }}</div>
    @endif
    <div class="row">
        <div class="col-md-6">
<form action="{{ route('categories.update', $category[0]->id) }}" method="POST">
    @method('PUT')
    @csrf
    <div class="from-group">
<label for="name">Category Name:</label><br>
<input type="text" name="name" value="{{ $category[0]->name }}" class="from-conteol"/><br>
@error('name')
<p class="text-danger">{{ $message }}</p>
@enderror
    </div>
    <br>
<div class="from-group">
<input class="btn btn-primary" type="submit" value="Updare">
</div>
</form>
    </div>
    </div>
</div>
</div>
</div>
@endsection