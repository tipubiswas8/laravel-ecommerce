<?php

namespace App\Http\Controllers\Visitors\Home;

use App\Http\Controllers\Controller;
use App\Models\Product\Product;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(Request $request){
        $products = Product::paginate(18);
        return view('visitors.home.home', compact('products'));
    }
}
