
@extends('visitors.layouts.master')
@section('main-content')
  
<div class="container">
    <br><br><br><br><br><br>
    <div class="from-control" style="height: 1000px">
        <h3 class="text-success">Transaction is successfully Completed.</h3>
        <p class="text-info">Thanks for shopping with us</p>
        <img src="{{ asset('images/visitors/thanks.png') }}" alt="IMG" height="200" width="200">
    </div>
</div>
@endsection
