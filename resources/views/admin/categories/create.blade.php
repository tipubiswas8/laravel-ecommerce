
@extends('admin.layouts.master')
@section('main-content')
<div class="container">
    <div class="row">
        <div class="card bg-dark text-light">
            <div class="card-body">
                @if(session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
                @endif
                @if(session('error'))
                <div class="alert alert-danger">{{ session('error') }}</div>
                @endif

                <h5>Create Category</h5>
<form action="{{ route('categories.store') }}" method="POST">
    @csrf
    <div class="from-group">
    <label for="name">Category Name: </label><br>
    <input name="name" id="name" class="from-control"><br><br>
    @error('name')
        <p class="text-danger">{{ $message }}</p>
    @enderror
    <div class="form-group">
    <input type="submit" class="btn btn-primary" value="Save">
    </div>
    </div>
</form>
            </div>
    </div>
    </div>
    </div>

@endsection