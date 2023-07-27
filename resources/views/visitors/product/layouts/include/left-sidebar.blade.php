<!-- start left sidebar -->
<div class="col-auto col-md-2 col-xl-2 pt-sm-5 px-0 bg-light" id="leftSitebar">
  <div class="d-flex flex-column align-items-center align-items-sm-start px-3 my-5 pt-2 text-white min-vh-100 sticky-top">

<form action="{{ url('filter') }}" method="GET" id="myForm">

  {{-- Secach product --}}
  <div class="row">
  <div class="cart-body text-dark border border-warning">
    <div class="row">
        <div class="col-md-9 g-0">
            <input type="text" name="name" class="form-control" placeholder="Search" value="">
        </div>
        <div class="col-md-3 g-0">
            <button class="form-control bg-success"><i class="fa fa-search"></i></button>
        </div>
    </div>
  </div>
  </div>
<br>


{{-- Filter by category using checkbox --}}
<div class="row">
<div class="cart-body text-dark border border-warning">
  <h5>Categories</h5>
  @foreach ($productCategory as $category)
  <input type="checkbox" name="category[]" id="{{ $category->id }}" value="{{ $category->id }}">
  <label for="{{ $category->id }}">{{ $category->name }}</label><br>
  @endforeach
  {{-- <div class="d-grid">
    <input  type="submit" value="Apply" class="btn btn-block btn-primary mb-0">
  </div> --}}
</div>
</div>
<br>


{{-- Sort by --}}
<div class="row">
  <div class="cart-body text-dark border border-warning">
  <select name="sort_by" class="form-control">
    <option value="id">--Sort by--</option>
        <option value="name">Name</option>
        <option value="category_id">Category</option>
        <option value="price">Price</option>
        <option value="quantity">Quantity</option>
        <option value="status">Status</option>
        <option value="created_at">Created Time</option>
  </select>
  <br>
  {{-- <div class="d-grid">
    <input  type="submit" value="Apply" class="btn btn-block btn-primary mb-0">
  </div> --}}
  </div>
</div>
  <br>

{{-- Filter by category using select option --}}
  {{-- <div class="row">
  <div class="cart-body text-dark border border-warning">
  <select name="category_id" class="form-control">
    <option value="all">--All Category--</option>
        @foreach ($productCategory as $category)
        <option value="{{ $category->id }}">{{ $category->name }}</option>
        @endforeach
  </select>
  <br>
    <div class="d-grid">
    <input  type="submit" value="Apply" class="btn btn-block btn-primary mb-0">
    </div>
  </div>
  </div>
  <br> --}}



{{-- Price filtering --}}
<div class="row">
  <div class="cart-body text-dark border border-warning">
    <h5>Price:</h5>
    <div class="row">
        <div class="col-md-6">
            <label>Min</label>
            <input class="form-control" type="number" name="min" min="0" max="1000000" placeholder="10">
        </div>
        <div class="col-md-6">
            <label>Max</label>
            <input class="form-control" type="number" name="max" min="0" max="1000000" placeholder="10 lac">
        </div>
    </div>
    <br>
    <div class="d-grid">
    <input  type="submit" value="Apply" class="btn btn-block btn-primary mb-0">
    </div>
  </div>
</div>
</form>

        </div>
      </div>
      {{-- end left sidebar --}}

          <!-- start main content -->
<div class="col py-3 pt-5 mt-5">


