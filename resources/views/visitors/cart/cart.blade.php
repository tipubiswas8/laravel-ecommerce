@extends('visitors.layouts.master')

@section('main-content')
<div class="container">
    <br><br><br><br>
    <div class="border border-5 border-warning p-3">
    <table id="cart" class="table table-hover table-condensed">
        <thead>
        <tr>
            <th style="width:30%">Product</th>
            <th style="width:10%">Price</th>
            <th style="width:8%">Quantity</th>
            <th style="width:22%" class="text-center">Subtotal</th>
            <th style="width:10%">Update||Delete</th>
        </tr>
        </thead>
        <tbody>

        <?php $total = 0 ?>

        @if(session('cart'))
            @foreach(session('cart') as $id => $details)
                <?php $total += $details['price'] * $details['quantity'] ?>
                <tr>
                    <td data-th="Product">
                        <div class="row">
                            <div class="col-sm-3 hidden-xs"><img src="{{ asset($details['image']) }}" width="100" height="100" class="img-responsive"/></div>
                            <div class="col-sm-9">
                                <h6 class="nomargin">{{ $details['name'] }}</h6>
                            </div>
                        </div>
                    </td>
                    <td data-th="Price">{{ $details['price'] }} Taka</td>
                    <td data-th="Quantity">
                        <input type="number" value="{{ $details['quantity'] }}" class="form-control quantity" />
                    </td>
                    <td data-th="Subtotal" class="text-center">{{ $details['price'] * $details['quantity'] }} Taka</td>
                    <td class="actions" data-th="">
                        <button class="btn btn-info btn-sm update-cart" data-id="{{ $id }}"><i class="fa fa-refresh"></i></button>
                        <button class="btn btn-danger btn-sm remove-from-cart" data-id="{{ $id }}"><i class="fa fa-trash"></i></button>
                    </td>
                </tr>
            @endforeach
        @endif
        </tbody>
        {{-- <tfoot> 
        <tr>
            <td><a href="{{ url('/') }}" class="btn btn-warning"><i class="fa fa-angle-left"></i> Continue Shopping</a></td>
            <td colspan="2" class="hidden-xs"></td>
            <td class="hidden-xs text-center"><strong>Total ${{ $total }}</strong></td>
            <td><a href="{{ url('easy-checkout') }}" class="btn btn-primary"> Place Order <i class="fa fa-angle-right"></i></a></td>
        </tr>
        </tfoot> --}}
    </table>
    <br><br><hr>

<div class="" style="background-color:rgb(186, 228, 245); height: 80px">
<div class="row"> 
    <div class="col-md-8">
     <span><a href="{{ url('/visitor/products') }}" class="btn btn-warning"><i class="fa fa-angle-left"></i> Continue Shopping</a></span>
    </div>
    <div class="col-md-2">
        <span class="btn btn-success text-bold disabled">Total = {{ $total }} BDT</span>
    </div>
    <div class="col-md-2">
     <span><a href="{{ url('checkout') }}" class="btn btn-primary" id="order"> Checkout <i class="fa fa-angle-right"></i></a></span>
    </div>
</div>
</div>

<br>



{{-- <div class="" style="background-color:rgb(186, 228, 245)">
    <div class="row"> 
        <div class="col-md-8">
         <span><a href="/" class="btn btn-warning"><i class="fa fa-angle-left"></i> Continue Shopping</a></span>
        </div>

        <div class="col-md-2">
            <span class="btn btn-info text-bold">Total = {{ $total }} BDT</span>
        </div>
    </div>

    <div class="row">
        <div class="col-md-3">
        </div>
        <div class="col-md-3">
            <span>
            <select class="form-control" name="payment" id="payment">
                <option>----Select Payment Method----</option>
                <option value="easy">Easy payment</option>
                <option value="hosted">Hosted Payment</option>
                <! --  <option value="cash">Cash on delivery</option> -->
                <! --  <option value="stripe">Stripe Payment</option> -->
              </select>
            </span>
        </div>
 
        <div class="col-md-2">
         <span><a href="" class="btn btn-primary" id="myOrder"> Checkout <i class="fa fa-angle-right"></i></a></span>
        </div>
    </div>
</div> --}}


 {{-- <p>{{ csrf_token() }}</p> --}}

  </div>
</div>
@endsection

@section('scripts')
    <script type="text/javascript">
        $(".update-cart").click(function (e) {
            $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')
            }
        });
           e.preventDefault();

           var ele = $(this);
           //  console.log(ele);
           // var data = {id: ele.attr("data-id"), quantity: ele.parents("tr").find(".quantity").val()};
           // console.log(data);

           // var headers = {'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')};
           // console.log(headers);

            $.ajax({
               url: '{{ route('update') }}',
               type: "PUT",
               data: {_token: '{{ csrf_token() }}', id: ele.attr("data-id"), quantity: ele.parents("tr").find(".quantity").val()},
               success: function (response) {
                   window.location.reload();
               }
            });
            // console.log(data.id);
        });

        $(".remove-from-cart").click(function (e) {
            e.preventDefault();

            var ele = $(this);
            var data = {_token: '{{ csrf_token() }}', id: ele.attr("data-id")};
            if(confirm("Are you sure")) {
                $.ajax({
                    url: '{{ url('remove-from-cart') }}',
                    method: "DELETE",
                    data: {_token: '{{ csrf_token() }}', id: ele.attr("data-id")},
                    success: function (response) {
                    window.location.reload();
                    }
                });
            }
           // console.log(data);
        });


    // $('#payment').change(function (){
    //     if($('#payment').val() === "easy"){
    //     $('#myOrder').prop('href', 'easy-checkout');
    //     }
    //     else if($('#payment').val() === "hosted"){
    //     $('#myOrder').prop('href', 'hosted-checkout');
    //     }
    //     // else if($('#payment').val() === "cash"){
    //     // $('#myOrder').prop('href', 'cash-on-delivery');
    //     // }
    //     // else if($('#payment').val() === "stripe"){
    //     // $('#myOrder').prop('href', 'stripe-payment');
    //     // }
    //     console.log($('#payment').val());
    // });

    </script>
@endsection