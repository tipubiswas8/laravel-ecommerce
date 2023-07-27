
@extends('visitors.layouts.master')
@section('main-content')
  
<div class="container">
    <br/><br/>
    <div class="py-5 text-center">
        <h2>Checkout</h2>
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
        </div>


        <div class="col-md-4 order-md-1">
            <h4 class="mb-3">Billing address</h4>
            <form action="{{ url('payment') }}" method="POST" class="needs-validation">
                <input type="hidden" value="{{ csrf_token() }}" name="_token" />
                <div class="row">
                <div class="col-md-12 mb-3">
                    <label for="customer_name">Full name</label>
                    <input type="text" name="customer_name" class="form-control" id="" placeholder="Your Name" required>
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
                    <input type="text" name="customer_mobile" class="form-control" id="" placeholder="Your Mobile" required>
                    <div class="invalid-feedback" style="width: 100%;">
                        Your Mobile number is required.
                    </div>
                </div>
            </div>

            <div class="mb-3">
                <label for="customer_email">Email</label>
                <input type="email" name="customer_email" class="form-control" id="" placeholder="you@email" required>
                <div class="invalid-feedback">
                    Please enter a valid email address for shipping updates.
                </div>
            </div>

            <div class="mb-3">
                <label for="customer_address">Address</label>
                <input type="text" class="form-control" name="customer_address" placeholder="Your Address" required>
                <div class="invalid-feedback">
                    Please enter your shipping address.
                </div>
            </div>

            <input type="hidden" id="" name="total_amount" value="{{ $total }}">
            <br>


            <div class="form-control">
                <h4 class="text-cecter">Select Payment Method</h4>
                <hr>
                <input type="radio" name="payment" id="cash" value="cash" required>
                <label for="cash">Cash on delivery</label><br>

                <input type="radio" name="payment" id="easy" value="easy">
                <label for="easy">Easy payment</label><br>

                <input type="radio" name="payment" id="hosted" value="hosted">
                <label for="hosted">Hosted Payment</label><br>

                <input type="radio" name="payment" id="stripe" value="stripe" disabled>
                <label for="stripe">Stripe Payment</label>
            </div>

                <hr class="mb-4">
                <button class="btn btn-primary btn-lg btn-block" type="submit"> Buy Now </button>
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
