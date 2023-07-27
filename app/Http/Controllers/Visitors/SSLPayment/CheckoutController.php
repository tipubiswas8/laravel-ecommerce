<?php

namespace App\Http\Controllers\Visitors\SSLPayment;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Library\SslCommerz\SslCommerzNotification;

class CheckoutController extends Controller{

    public function checkout(){
        return view('visitors.payment.sslCommerz.checkout');
    }

public function payment(Request $request){
     $data = $request->all();
     // dd($data);

    if($request->payment == "easy"){
        return view('visitors.payment.sslCommerz.easy-payment', ['data' => $data]);
    }
    else if($request->payment == "hosted"){
        return view('visitors.payment.sslCommerz.hosted-payment', ['data' => $data]);
    }
    else if($request->payment == "stripe"){
        return view('visitors.payment.sslCommerz.stripe-payment', ['data' => $data]);
    }
    else{
        return view('visitors.payment.sslCommerz.cash-payment', ['data' => $data]);
    }
}


public function stripe(Request $request){
    //     // dd($request->all());
    //     $requestData = (array) json_decode($request->cart_json);
    //     // return response()->json($requestData);
    //     // dd($requestData);

    //     $post_data = array();

    //     // must required fields
    //     $post_data['currency'] = "BDT";
    //     $post_data['tran_id'] = '0000';
    //     $post_data['shipping_method'] = "NO";
    //     $post_data['product_name'] = "Computer";
    //     $post_data['product_category'] = "Goods";
    //     $post_data['product_profile'] = "physical-goods";

    //     $post_data['total_amount'] = $requestData['amount'];
    //     $post_data['cus_name'] = $requestData['cus_name'];
    //     $post_data['cus_email'] = $requestData['cus_email'];
    //     $post_data['cus_add1'] = $requestData['cus_address'];
    //     $post_data['cus_phone'] = $requestData['cus_phone'];

    //     DB::table('orders')
    //     ->where('transaction_id', $post_data['tran_id'])
    //     ->updateOrInsert([
    //         'name' => $post_data['cus_name'],
    //         'email' => $post_data['cus_email'],
    //         'phone' => $post_data['cus_phone'],
    //         'amount' => $post_data['total_amount'],
    //         'status' => 'Pending',
    //         'address' => $post_data['cus_add1'],
    //         'transaction_id' => '0000',
    //         'currency' => $post_data['currency']
    //     ]);

    // $sslc = new SslCommerzNotification();
    // # initiate(Transaction Data , false: Redirect to SSLCOMMERZ gateway/ true: Show all the Payement gateway here )
    // $payment_options = $sslc->makePayment($post_data, 'checkout', 'json');

    // if (!is_array($payment_options)) {
    //     print_r($payment_options);
    //     $payment_options = array();
    // }
}

public function cash(Request $request){

   $insert = DB::table('orders')
    ->updateOrInsert([
        'name' => $request->customer_name,
        'email' => $request->customer_email,
        'phone' => $request->customer_mobile,
        'amount' => $request->total_amount,
        'status' => 'Pending',
        'address' => $request->customer_address,
        'transaction_id' => '0000',
        'currency' => 'BDT'
    ]);
    
    if(!$insert){
        echo "Opps!! something went wrong, please try again";
        // return view('visitors.payment.sslCommerz.fail');
    }
    else{
        session()->flush();
        echo "Order place successfully completed, Thanks for shopping.......";
        // return view('visitors.payment.sslCommerz.success');
    }
}
}