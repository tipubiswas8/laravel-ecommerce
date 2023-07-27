@extends('admin.layouts.master')
@section('main-content')

<div class="container">
    <div class="row">
        <div class="col">
         <div class="card">
           <div class="card-header">
            <h2 class="mt-5 text-center">Order Details</h2>
           </div>
           <div class="card-body">
            @if (session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif
            @if (session('error'))
                <div class="alert alert-danger">{{ session('error') }}</div>
            @endif
            <div class="bg-warning">
                <h4 class="text-center">Total Selling Price</h4>
                <hr>
                <h5 class="text-center">Order Total: <b>{{ $summary->total_amount }}</b> BDT</h5>
                <br>
            </div>
            <br>
            <table class="table table-bordered">
                <tr>
                 <th>Order ID</th>
                 <th>Name</th>
                 <th>Email</th>
                 <th>Phone</th>
                 <th>Total Amount</th>
                 <th>Customer Address</th>
                 <th>Transaction ID</th>
                 <th>Currency</th>
                 <th>Delevery Status</th>
                 <th>Action</th>
                </tr>
                <tbody>
                    @foreach ($orders as $order)
                    <tr>
                        <td>#{{$order->id }}</td>
                        <td>{{ $order->name }}</td>
                        <td>{{ $order->email }}</td>
                        <td>{{ $order->phone }}</td>
                        <td>{{ $order->amount }}</td>
                        <td>{{ $order->address }}</td>                 
                        <td>{{ $order->transaction_id }}</td>
                        <td>{{ $order->currency }}</td>
                        <td>{{ $order->status }}</td>

                      {{-- @if($order->status == "Processing")
                      <p style="display: none">{{ $order->status = 0 }}</p>
                      @endif --}}

                        {{-- <td>{{ $order->status?'Delivered':'Pending' }}</td> --}}

                        {{-- <p style="display: none">{{ $order->status = 0 }}</p> --}}
                        <td>
                            @if ($order->status == "Failed")
                            <a class="btn btn-sm btn-danger" href='{{ url("orders/change-status/{$order->id}/{$order->status}") }}'>Mark as Cancel</a>

                            @elseif ($order->status == "Cancel")
                            <button class="btn btn-sm btn-secondary">Canceled</button>

                            @elseif ($order->status == "Pending")
                            <a class="btn btn-sm btn-info" href='{{ url("orders/change-status/{$order->id}/{$order->status}") }}'>Mark as Processing</a>

                            @elseif ($order->status == "Processing")
                            <a class="btn btn-sm btn-warning" href='{{ url("orders/change-status/{$order->id}/{$order->status}") }}'>Mark as Delivered</a>

                            @else
                            <button class="btn btn-sm btn-success">Delivered</button>
                            @endif
                        </td>

                    </tr>
                    @endforeach
                </tbody>
            </table>
           </div>
         </div>
        </div>
    </div>
</div>
@endsection