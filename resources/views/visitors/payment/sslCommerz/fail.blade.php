
@extends('visitors.layouts.master')
@section('main-content')
  
<div class="container">
    <br><br><br><br><br><br>
    <div class="from-control" style="height: 1000px">
        <h3 class="text-danger">Ohh...!!! </h3>
        <p class="text-warning">Transaction is Invalid</p>
        <img src="{{ asset('images/visitors/fail.jpg') }}" alt="IMG" height="200" width="200">
    </div>
</div>
@endsection
