@extends('visitors.product.layouts.master')
@section('main-content')
<div class="container-fluid">
    <br/>
    @if (session('success'))
    <h5 class="text text-success">{{ session('success') }}</h5>
    <br>

    {{-- <script>
        alert('Product added to cart successfully!')
    </script> --}}
    @endif
        <div class="row" style="height: 200px, width: 250px">
            @if(count($products) > 0)
            @foreach($products as $product)
                {{-- <div class="col-xs-18 col-sm-6 col-md-3"> --}}
                    <div class="col-sm-4 col-md-2">
                       <div class="thumbnail">
                            <a href="{{ route('product.details', $product->id) }}" class="pro_text">
                            <img class="pro-image" src="{{ asset($product->image) }}" width="300" height="150">
                            <h5>{{ $product->name }}</h5>
                            <div class="" style="height: 60px">
                            {{-- <p>{{ \Illuminate\Support\Str::limit(strtolower($product->description), 30) }}</p> --}}
                            <p>{{ \Illuminate\Support\Str::limit($product->description, 30) }}</p>
                            </div>
                            <p><strong>Price: </strong> {{ $product->price }} Taka</p>
                            </a>
                            <p class="btn-holder"><a href="{{ url('add-to-cart/'.$product->id) }}" class="btn btn-warning btn-block text-center" role="button">Add to cart</a> </p>
                        </div>
                    </div>
                {{-- </div> --}}
            @endforeach
            @else
              <p>No result found!</p>
            @endif

            
         <div class="col-md-12 pagination-block d-flex justify-content-center">
            {{-- {{ $products->links() }} --}}
            {{  $products->appends(request()->input())->links('visitors.product.pagination-link') }}
          </div>


        </div>
    </div>

@endsection