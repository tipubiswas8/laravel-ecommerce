<!DOCTYPE html>
<html>
<head>
    <title>Project</title>
    <link rel="stylesheet" href="{{ asset('css/admin/bootstrap5/bootstrap.css') }}">
</head>
<body>
    <div class="container-fluid">
      <div class="row flex-nowrap">
        <!-- Header -->
        <div class="col-md-12 p-3 bg-info text-light fixed-top">
          <header>
            {{-- <p>This is header section</p> --}}
            <div class="d-flex justify-content-between">
            <span>
            <a href="/admin" class="btn btn-dark">Dashboard</a>
            </span>
            
            <span>
              <span class="d-inline text-gray-600 small">Admin-1</span>
               <img class="img-profile rounded-circle" src="{{ asset('images/admin/user.png') }}" width="50" height="50">
            </span>
            </div>
          </header>
        </div>


