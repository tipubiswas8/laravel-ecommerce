@extends('visitors.layouts.master')

@section('main-content')
    <div class="container">
    <br><br><br>
        <h4>Product Description</h4>
        <hr />
        <div class="row">
                {{-- <div class="col-xs-18 col-sm-6 col-md-3"> --}}
                <div class="col-sm-4 col-md-6">
                    <div class="thumbnail">
                        {{-- {{ dd($product->image) }} --}}
                        <img src="{{ asset($product->image) }}" height="400" width="300" class="mr-3" alt="..."/>
                            <div class="caption">
                            <br>
                            <h4>{{ $product->name }}</h4>
                            <p><strong>Price: </strong> {{ $product->price }} Taka</p>
                               <form action="{{ url('add-multi-qty-to-cart/'.$product->id) }}" method="POST">
                                @csrf
                                <strong><p>Quantity:</p></strong><input type="number" name="quantity" value="1" placeholder="quantity"/>
                                <br>
                                <input type="submit" id="addToCart" class="btn btn-warning text-center" value="Add to cart">
                                <input type="submit" id="buyNow" class="btn btn-primary text-center" value="Buy Now">
                                <input type="hidden" name="action" id="action" value="buy_now">
                               </form>
                            <p>{{ $product->description }}</p>
                            </div>
                    </div>
                </div>
                {{-- </div> --}}

                <div class="col-sm-4 col-md-6">
                    @if (session('success'))
                    <h5 class="text text-success">{{ session('success') }}</h5>
                    <br>
                    @endif
                </div>
        </div>
    </div>
@endsection

@section('scripts')
<script type="text/javascript">
let x = $("#action").val();
$('#addToCart').click(function(){
  $("#action").val("add_to_cart");
});
// console.log(x);
</script>
@endsection
