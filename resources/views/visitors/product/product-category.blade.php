@extends('visitors.layouts.master')
@section('main-content')
    <div class="container">
        <br><br><br>
        @if (session('success'))
        <h5 class="text text-success">{{ session('success') }}</h5>
        <br>
        @endif
        <div class="row" style="height: 200px, width: 250px">
            @foreach($proCategory as $product)
                    <div class="col-sm-4 col-md-2">
                       <div class="thumbnail">
                            <a href="{{ route('product.details', $product->id) }}" class="pro_text">
                            <img class="pro-image" src="{{ asset($product->image) }}" width="300" height="150">
                            <h4>{{ $product->name }}</h4>
                            <div class="" style="height: 60px">
                            <p>{{ \Illuminate\Support\Str::limit(strtolower($product->description), 30) }}</p>
                            </div>
                            <p><strong>Price: </strong> {{ $product->price }} Taka</p>
                            </a>
                            <p class="btn-holder"><a href="{{ url('add-to-cart/'.$product->id) }}" class="btn btn-warning btn-block text-center" role="button">Add to cart</a> </p>
                        </div>
                    </div>
            @endforeach
        </div>
    </div>
@endsection