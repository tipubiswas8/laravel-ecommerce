        <!-- Left Sidebar -->
        <div class="col-auto col-md-2 col-xl-2 pt-sm-5 px-0 bg-success">
            <div
              class="d-flex flex-column align-items-center align-items-sm-start px-3 my-5 pt-2 text-white min-vh-100"
            >
        {{-- <p>This is left sidebar section</p> --}}
              <div class="row">
              <a href="{{ route('categories.index') }}" class="btn btn-info">Category</a>
              <a href="{{ route('products.index') }}" class="btn btn-warning">Product</a>
              <a href="{{ route('order.index') }}" class="btn btn-danger">Order</a>
              </div>
            </div>
          </div>

          <!-- Main Content -->
<div class="col py-3 pt-5 mt-5">