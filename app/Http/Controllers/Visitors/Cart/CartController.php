<?php

namespace App\Http\Controllers\Visitors\Cart;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product\Product;

class CartController extends Controller
{
    public function cart()
    {
        return view('visitors.cart.cart');
    }
    public function addToCart($id)
    {
        $product = Product::find($id);
        //dd($product);
        if(!$product) {
            abort(404);
        }
        $cart = session()->get('cart');
       // dd($cart);

        // if cart is empty then this the first product
        if(!$cart) {
            $cart = [
                    $id => [
                        "name" => $product->name,
                        "quantity" => 1,
                        "price" => $product->price,
                        "image" => $product->image
                    ]
            ];
            session()->put('cart', $cart);
            return redirect()->back()->with('success', 'Product added to cart successfully!');
        }
        // if cart not empty then check if this product exist then increment quantity
        if(isset($cart[$id])) {
            $cart[$id]['quantity']++;
            session()->put('cart', $cart);
            return redirect()->back()->with('success', 'Product added to cart successfully!');

        }
        // if item not exist in cart then add to cart with quantity = 1
        $cart[$id] = [
            "name" => $product->name,
            "quantity" => 1,
            "price" => $product->price,
            "image" => $product->image
        ];
        session()->put('cart', $cart);
        return redirect()->back()->with('success', 'Product added to cart successfully!');
    }

    
    public function update(Request $request)
    {
        if($request->id and $request->quantity)
        {
            $cart = session()->get('cart');
            $cart[$request->id]["quantity"] = $request->quantity;
            session()->put('cart', $cart);
            session()->flash('success', 'Cart updated successfully');
        }
    }
    public function remove(Request $request)
    {
        if($request->id) {
            $cart = session()->get('cart');
            if(isset($cart[$request->id])) {
                unset($cart[$request->id]);
                session()->put('cart', $cart);
            }
            session()->flash('success', 'Product removed successfully');
        }
    }



    public function addMultiQtyToCart($id, Request $req)
    {
        $qty = $req->quantity;
        $product = Product::find($id);
        //dd($product);
        if(!$product) {
            abort(404);
        }
        $cart = session()->get('cart');
       // dd($cart);

        // if cart is empty then this the first product
        if(!$cart) {
            $cart = [
                    $id => [
                        "name" => $product->name,
                        "quantity" => $qty,
                        "price" => $product->price * $qty,
                        "image" => $product->image
                    ]
            ];
            session()->put('cart', $cart);

        if($req->action == "add_to_cart"){
              return redirect()->back()->with('success', 'Product added to cart successfully!');
        }
        else{
             return redirect('/cart');
        }
        }

        // if cart not empty then check if this product exist then increment quantity
        if(isset($cart[$id])) {
            $cart[$id]['quantity'] = $qty;
            session()->put('cart', $cart);
            
        if($req->action == "add_to_cart"){
              return redirect()->back()->with('success', 'Product added to cart successfully!');
        }
        else{
            return redirect('/cart');
       }
        }
        
        // if item not exist in cart then add to cart
        $cart[$id] = [
            "name" => $product->name,
            "quantity" => $qty,
            "price" => $product->price * $qty,
            "image" => $product->image
        ];
        session()->put('cart', $cart);

        if($req->action == "add_to_cart"){
            return redirect()->back()->with('success', 'Product added to cart successfully!');
      }
      else{
        return redirect('/cart');
      }
    }
}
