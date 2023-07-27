<?php

namespace App\Http\Controllers\Visitors\Filter;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product\Product;

class FilterController extends Controller
{
   public function filter(Request $request){
      // dd($request->category_id);
      // dd($request->all());

     $query = Product::query();
      // search
      if(isset($request->name) && $request->name != null && $request->sort_by) {
         $products = $query->where('name', 'like', '%' . $request->name . '%')->orderBy($request->sort_by)->paginate(18);
      }
      // sort
      if(isset($request->sort_by) && $request->sort_by != null) {
         $products = $query->orderBy($request->sort_by)->paginate(18);
      }
      // category select
      if(isset($request->category_id) && $request->category_id != "all" && $request->sort_by) {
         $products = $query->where('category_id', 'like', '%' . $request->category_id . '%')->orderBy($request->sort_by)->paginate(18);
       }
      // category checkbox
      if(isset($request->category) && $request->category != null && $request->sort_by) {
         $products = $query->whereHas('category', function($q) use($request) {
         $q->whereIn('id', $request->category);
         })->orderBy($request->sort_by)->paginate(18);
       }
      // minimum price
      if(isset($request->min) && $request->min != null && $request->sort_by) {
         $products = $query->where('price', '>=', $request->min)->orderBy($request->sort_by)->paginate(18);
       }
      // maximum price
      if(isset($request->max) && $request->max != null && $request->sort_by) {
         $products = $query->where('price', '<=', $request->max)->orderBy($request->sort_by)->paginate(18);
       }

      else{
         $products = $query->paginate(60);
      }
  
      return view('visitors.product.product', compact('products'));
     }




   // public function filter(Request $request){
   //    // dd($request->category_id);
   //    // dd($request->all());

   //   $query = Product::query();
   //    // search
   //    if(isset($request->name) && $request->name != null && $request->sort_by) {
   //       $products = $query->where('name', 'like', '%' . $request->name . '%')->orderBy($request->sort_by)->paginate(6);
   //    }
   //    // sort
   //    if(isset($request->sort_by) && $request->sort_by != null) {
   //       $products = $query->orderBy($request->sort_by)->paginate(6);
   //    }
   //    // category select
   //    if(isset($request->category_id) && $request->category_id != "all" && $request->sort_by) {
   //       $products = $query->where('category_id', 'like', '%' . $request->category_id . '%')->orderBy($request->sort_by)->paginate(6);
   //     }
   //    // category checkbox
   //    if(isset($request->category) && $request->category != null && $request->sort_by) {
   //       $products = $query->whereHas('category', function($q) use($request) {
   //       $q->whereIn('id', $request->category);
   //       })->orderBy($request->sort_by)->paginate(6);
   //     }
   //    // minimum price
   //    if(isset($request->min) && $request->min != null && $request->sort_by) {
   //       $products = $query->where('price', '>=', $request->min)->orderBy($request->sort_by)->paginate(6);
   //     }
   //    // maximum price
   //    if(isset($request->max) && $request->max != null && $request->sort_by) {
   //       $products = $query->where('price', '<=', $request->max)->orderBy($request->sort_by)->paginate(6);
   //     }
  
   //     else{
   //       $products = $query->paginate(12);
   //    }
  
   //    return view('visitors.home.product', compact('products'));
   //   }





   // public function filter(Request $request){
   //  // dd($request->category_id);
   //  // dd($request->all());

   //  if(isset($request->name) && $request->name != null) {
   //      $products = Product::where('name', 'like', '%' . $request->name . '%')->paginate(6);
   //   }

   //   elseif(isset($request->name) || isset($request->category) && $request->category != null) {
   //      $products = Product::whereHas('category', function($q) use($request) {
   //      $q->whereIn('id', $request->category);
   //      })->paginate(6);
   //   }

   //   elseif(isset($request->name) || isset($request->category_id) && $request->category_id != "all") {
   //      $products = Product::where('name', 'like', '%' . $request->name . '%')
   //      ->where('category_id', 'like', '%' . $request->category_id . '%')->paginate(6);
   //   }

   //   elseif(isset($request->name) || isset($request->min) && $request->min != null) {
   //      $products = Product::where('name', 'like', '%' . $request->name . '%')
   //      ->where('price', '>=', $request->min)->paginate(6);
   //   }

   //   elseif(isset($request->name) || isset($request->max) && $request->max != null) {
   //      $products = Product::where('name', 'like', '%' . $request->name . '%')
   //      ->where('price', '<=', $request->max)->paginate(6);
   //   }

   //   else{
   //      $products = Product::paginate(12);
   //  }

   //  return view('visitors.home.product', compact('products'));
   // }
}
