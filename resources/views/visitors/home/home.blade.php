@extends('visitors.layouts.master')

@section('main-content')
<br><br><br><br>
    <div class="container-fluid">

      <!-- Carousel slider bootstrap 5 -->
      <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-indicators">
          <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
          <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
          <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
          <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="3" aria-label="Slide 4"></button>
        </div>
        <div class="carousel-inner">
          <div class="carousel-item active">
            <img src={{ asset('images/visitors/category/Cosmetics.jpg') }} class="d-block w-100" alt="..." style="height: 95%">
            <div class="carousel-caption d-none d-md-block">
              <h5>Cosmetics slide label</h5>
              <p>Some representative placeholder content for the cosmetics slide.</p>
            </div>
          </div>
          <div class="carousel-item">
            <img src={{ asset('images/visitors/category/Food.jpg') }} class="d-block w-100" alt="..." style="height: 95%">
            <div class="carousel-caption d-none d-md-block">
              <h5>Food slide label</h5>
              <p>Some representative placeholder content for the food slide.</p>
            </div>
          </div>
          <div class="carousel-item">
            <img src={{ asset('images/visitors/category/Furniture.jpg') }} class="d-block w-100" alt="..." style="height: 95%">
            <div class="carousel-caption d-none d-md-block">
              <h5>Furniture slide label</h5>
              <p>Some representative placeholder content for the furniture slide.</p>
            </div>
          </div>
          <div class="carousel-item">
            <img src={{ asset('images/visitors/category/Stationery.jpg') }} class="d-block w-100" alt="..." style="height: 95%">
            <div class="carousel-caption d-none d-md-block">
              <h5>Stationery slide label</h5>
              <p>Some representative placeholder content for the stationery slide.</p>
            </div>
          </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Next</span>
        </button>
      </div>

      <br>
    <div class="row">
      <h2 class="text-center">All Products</h2>
      <hr>
        @foreach($products as $product)
          <div class="col-sm-4 col-md-2">
            <div class="thumbnail my_container">
              <a href="{{ url('visitor/products') }}" class="text-decoration-none text-reset text-center">
              <img src="{{ asset($product->image) }}" class="rounded mx-auto d-block my_image" alt="IMG" style="height: 60%; width: 80%">
              <div class="my_middle">
                <h4 class="my_text">{{ $product->name }}</h4>
              </div>
              <h4 class="text-decoration-none">{{ $product->name }}</h4>
              <p class="text-decoration-none"><strong>Price: </strong> {{ $product->price }} Taka</p>
            </a>
            </div>
          </div>
        @endforeach
    </div>
   
    <br><br><br>
    <h2 class="text-center">All Categories</h2>
    <hr/>

<div class="row">
  @foreach($productCategory as $pro_cat)
  <caption><h3 class="text-center">{{ $pro_cat->name }}</h3></caption>
  <hr/>
        @php
        $categories = App\Models\Product\Product::query()->where('category_id', $pro_cat->id)->paginate(6);
        @endphp
    <div class="row">
        @foreach($categories as $category)

          <div class="col-sm-4 col-md-2">
            <a href="{{ url('pro-category', $category->category_id) }}" class="text-decoration-none text-reset fst-italic text-center">
            <div class="thumbnail">
              <figure class="hover-rotate">
              <img src="{{ asset($category->image) }}" class="rounded-circle" alt="IMG" style="height: 50%; width: 100%; border-radius: 50%">
            </figure>
                <h5>{{ $category->name }}</h5>
              <p><strong>Price: </strong> {{ $category->price }} Taka</p>
            </div>
            </a>
          </div>

        @endforeach
    </div>
    @endforeach
</div>

</div>