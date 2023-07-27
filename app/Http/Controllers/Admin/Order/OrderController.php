<?php

namespace App\Http\Controllers\Admin\Order;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order\Order;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{
    public function index(Request $request){
       $orders = Order::all();
        $summary = DB::table('orders')
        ->select(
         DB::raw('SUM(amount) AS total_amount')
         )->first();
        return view('admin.order.index', compact('orders', 'summary'));
    }

    public function changeStatus($id, $status){
    // echo $id. $status;
    // dd($status);

    if($status == "Failed"){
        $status = "Cancel";
    }
    elseif($status == "Pending"){
        $status = "Processing";
    }
    elseif($status == "Processing"){
        $status = "Delivered";
    }

        try{
            $order = Order::find($id);
            $order->status = $status;
            $order->update();
            return redirect()->back()->with('success', 'Order delivery status changed to '.$status);
        }catch(\Exception $e){
            return redirect()->back()->with('error', 'Unable to change delivery status');
        }
    }
}
