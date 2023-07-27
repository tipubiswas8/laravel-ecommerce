<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

    {{-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous"> --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <link rel="stylesheet" type="text/css" href="{{ asset('css/visitors/bootstrap5/bootstrap.min.css') }}">
    {{-- <link rel="stylesheet" type="text/css" href="{{ asset('css/visitors/fontawesome6/all.min.css') }}"> --}}
    <link rel="stylesheet" type="text/css" href="{{ asset('css/visitors/cart.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/visitors/home.css') }}">

    <script src="{{ asset('css/visitors/bootstrap5/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('js/visitors/jquery3.3/jquery.min.js') }}"></script>
</head>

<body>
    {{-- start main container --}}
    <div class="container-fluid">
        {{-- star main row --}}
      <div class="row">
        <!-- Header -->
        <div class="col-lg-12 col-sm-12 col-12 bg-secondary main-section pb-4 fixed-top">

    {{-- Home --}}
    <a href="/"><button class="homeButton"><i class='fa fa-home' style='color: rgb(16, 243, 205))'></i> Home</button></a>
    
    {{-- Product --}}
    <a href="/visitor/products"><button class="homeButton"><i class='fa fa-product-hunt' style='color: rgb(16, 243, 205))'></i> Product</button></a>
    
    {{-- Search-1 --}}
    <form class="d-inline-flex" style="width: 70%" action="{{ url('/visitor/products') }}">
        <input name="search" class="btn btn-light text-start rounded-0 col-md-6" type="search" placeholder="Search here">
        <button class="btn bg-white btn-outline rounded-0"><i class="fa fa-search"></i></button>
        <input class="btn bg-white rounded-0" type="reset" value="Clear">
    </form>

            {{-- Cart --}}
            <div class="dropdown">
                <button type="button" class="btn btn-info text-light" data-bs-toggle="dropdown">
                    <i class="fa fa-shopping-cart" aria-hidden="true"></i> Cart <span class="badge rounded-pill bg-danger">{{ count((array) session('cart')) }}</span>
                </button>
                <div class="dropdown-menu payment-cart">
                    <div class="row total-header-section bg-success text-light">
                        <div class="col-lg-6 col-sm-6 col-6">
                            <i class="fa fa-shopping-cart" aria-hidden="true"></i> <span class="badge rounded-pill bg-danger">{{ count((array) session('cart')) }}</span>
                        </div>
                        <?php $total = 0 ?>
                        @foreach((array) session('cart') as $id => $details)
                            <?php $total += $details['price'] * $details['quantity'] ?>
                        @endforeach
                        <div class="col-lg-6 col-sm-6 col-6 total-section text-right">
                            <p>Total: <span class=""><i class="fa-solid fa-bangladeshi-taka-sign"></i>  {{ $total }}</span></p>
                        </div>
                    </div>

                    @if(session('cart'))
                        @foreach(session('cart') as $id => $details)
                            <div class="row cart-detail">
                                <div class="col-lg-4 col-sm-4 col-4 cart-detail-img">
                                    <img src="{{ asset($details['image']) }}" height="10" width="10"/>
                                </div>
                                <div class="col-lg-8 col-sm-8 col-8 cart-detail-product">
                                    <p>{{ $details['name'] }}</p>
                                    <span class="price">Price: {{ $details['price'] }} <i class="fa-solid fa-bangladeshi-taka-sign"></i> </span> 
                                    <span class="price"> Quantity: {{ $details['quantity'] }}</span>
                                    {{-- <span class="count"> Quantity:{{ $details['quantity'] }}</span> --}}
                                </div>
                            </div>
                        @endforeach
                    @endif
                    <div class="row">
                        <div class="col-lg-12 col-sm-12 col-12 text-center checkout d-grid">
                            <a href="{{ url('cart') }}" class="btn btn-primary btn-block">View all</a>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        {{-- end header --}}
        <br><br>

    </div>
    {{-- end main row --}}
    
  </div>
  {{-- end main container --}}
