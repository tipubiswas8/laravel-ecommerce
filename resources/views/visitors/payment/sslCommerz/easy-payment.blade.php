
@extends('visitors.layouts.master')
@section('main-content')
  
<div class="container">
    <br/><br/>
    <div class="py-5 text-center">
    <h3>EasyCheckout (Popup) - SSLCommerz</h3>
    </div>

    <div class="row">
        <div class="col-md-4 order-md-3 mb-4 payment-cart">
            <h4 class="d-flex justify-content-between align-items-center mb-3">
                <span class="text-muted">Your cart</span>
                <span class="badge rounded-pill bg-success">{{ count((array) session('cart')) }}</span>
            </h4>
            
            <?php $total = 0 ?>
            @if(session('cart'))
            @foreach(session('cart') as $id => $details)
                <?php $total += $details['price'] * $details['quantity'] ?>
            <ul class="list-group mb-3">
                <li class="list-group-item d-flex justify-content-between lh-condensed">
                    <div>
                        <h6 class="my-0">{{ $details['name'] }}</h6>
                        <span class="text-muted">Price {{ $details['price'] }}</span>
                        <p><small class="text-muted">Quantity {{ $details['quantity'] }}</small></p>
                    </div>
                    <span class="text-muted">Total={{ $details['price'] * $details['quantity']}}</span>
                </li>
            </ul>
            @endforeach
            @endif
            <hr>
            <h4 class="text-center font-italic" >Total Amount = {{ $total }} BDT</h4>
            <input type="hidden" id="total_amount" value="{{ $total }}">
        </div>

        
        <div class="col-md-4 order-md-1">
            <h4 class="mb-3">Billing address</h4>
            <form method="POST" class="needs-validation">
                <div class="row">
                    <div class="col-md-12 mb-3">
                        <label for="customer_name">Full name</label>
                        <input type="text" id="customer_name" class="form-control" value="{{ $data['customer_name'] }}" disabled>
                        <div class="invalid-feedback">
                            Valid customer name is required.
                        </div>
                    </div>
                </div>
    
                <div class="mb-3">
                    <label for="customer_mobile">Mobile</label>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text">+88</span>
                        </div>
                        <input type="text" id="customer_mobile" class="form-control" value="{{ $data['customer_mobile'] }}" disabled>
                        <div class="invalid-feedback" style="width: 100%;">
                            Your Mobile number is required.
                        </div>
                    </div>
                </div>
    
                <div class="mb-3">
                    <label for="customer_email">Email <span class="text-muted">(Optional)</span></label>
                    <input type="email" id="customer_email" class="form-control" value="{{ $data['customer_email'] }}" disabled>
                    <div class="invalid-feedback">
                        Please enter a valid email address for shipping updates.
                    </div>
                </div>
    
                <div class="mb-3">
                    <label for="customer_address">Address</label>
                    <input type="text" id="customer_address" class="form-control" value="{{ $data['customer_address'] }}" disabled>
                    <div class="invalid-feedback">
                        Please enter your shipping address.
                    </div>
                </div>


                <hr class="mb-4">
                <div class="custom-control custom-checkbox">
                    <input type="checkbox" class="custom-control-input" id="same-address">
                    <input type="hidden" value="1200" name="amount" id="total_amount" required/>
                    <label class="custom-control-label" for="same-address">Shipping address is the same as my billing
                        address</label>
                </div>
                <div class="custom-control custom-checkbox">
                    <input type="checkbox" class="custom-control-input" id="save-info">
                    <label class="custom-control-label" for="save-info">Save this information for next time</label>
                </div>
                <hr class="mb-4">
                <button class="btn btn-primary btn-lg btn-block" id="sslczPayBtn"
                        token="if you have any token validation"
                        postdata=""
                        order="If you already have the transaction generated for current order"
                        endpoint="{{ url('/pay-via-ajax') }}"> Pay Now
                </button>
            </form>
        </div>

        <div class="col-md-4 order-md-2">
            <h4 class="mb-3">Shipping address</h4>
            <form method="POST" class="needs-validation" novalidate>
                <div class="row">
                    <div class="col-md-12 mb-3">
                        <label for="firstName">Full name</label>
                        <input type="text" name="customer_name" class="form-control" id="" placeholder=""
                             required>
                        <div class="invalid-feedback">
                            Valid customer name is required.
                        </div>
                    </div>
                </div>

                <div class="mb-3">
                    <label for="mobile">Mobile</label>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text">+88</span>
                        </div>
                        <input type="text" name="customer_mobile" class="form-control" id="" placeholder=""
                             required>
                        <div class="invalid-feedback" style="width: 100%;">
                            Your Mobile number is required.
                        </div>
                    </div>
                </div>

                <div class="mb-3">
                    <label for="email">Email <span class="text-muted">(Optional)</span></label>
                    <input type="email" name="customer_email" class="form-control" 
                           placeholder=""  required>
                    <div class="invalid-feedback">
                        Please enter a valid email address for shipping updates.
                    </div>
                </div>

                <div class="mb-3">
                    <label for="address">Address</label>
                    <input type="text" class="form-control"  placeholder=""
                            required>
                    <div class="invalid-feedback">
                        Please enter your shipping address.
                    </div>
                </div>
            </form>
        </div>

    </div>

</div>
@endsection


@section('scripts')
<!-- If you want to use the popup integration, -->
<script>

var obj = {};
obj.cus_name = $("#customer_name").val();
obj.cus_phone = $("#customer_mobile").val();
obj.cus_email = $("#customer_email").val();
obj.cus_address = $("#customer_address").val();
obj.amount = $("#total_amount").val();

    // $('#customer_name').change(function(){
    // obj.cus_name = $('#customer_name').val();
    // });
    // $('#customer_mobile').change(function(){
    // obj.cus_phone = $('#customer_mobile').val();
    // });
    // $('#customer_email').change(function(){
    // obj.cus_email = $('#customer_email').val();
    // });
    // $('#customer_address').change(function(){
    // obj.cus_address = $('#customer_address').val();
    // });

    $("#sslczPayBtn").prop("postdata", obj);
    // console.log(obj.amount);

(function (window, document) {
    var loader = function () {
        var script = document.createElement("script"),
            tag = document.getElementsByTagName("script")[0];
        // script.src = "https://seamless-epay.sslcommerz.com/embed.min.js?" + Math.random().toString(36).substring(7); // USE THIS FOR LIVE
        script.src =
            "https://sandbox.sslcommerz.com/embed.min.js?" +
            Math.random().toString(36).substring(7); // USE THIS FOR SANDBOX
        tag.parentNode.insertBefore(script, tag);
    };
    window.addEventListener
        ? window.addEventListener("load", loader, false)
        : window.attachEvent("onload", loader);
    })(window, document);
</script>
@endsection


