<?php

namespace App\Http\Controllers\Visitors\Product;

use App\Http\Controllers\Controller;
use App\Models\Product\Product;

class VisitorProductController extends Controller
{    public function index()
    {
        if (request('search')) {
            $products = Product::where('name', 'like', '%' . request('search') . '%')->paginate(18);
         } else {
             $products = Product::paginate(60);
         }
        return view('visitors.product.product', compact('products'));
    }

    public function product($cat_id){
        // dd($cat_id);
        $proCategory = Product::query()->where('category_id', $cat_id)->get();
        return view('visitors.product.product-category', compact('proCategory'));
    }
    
    public function details($id){
        $product = Product::find($id);
         return view('visitors.product.product-details', compact('product'));
     }
}
