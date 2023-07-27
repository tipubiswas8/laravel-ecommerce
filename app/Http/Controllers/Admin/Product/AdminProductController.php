<?php

namespace App\Http\Controllers\Admin\Product;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product\Category;
use App\Models\Product\Product;
use Exception;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class AdminProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::all();
        return view('admin.products.index', ['products' => $products]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $categories = Category::all();
        return view('admin.products.create', ['categories' => $categories]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'name' => 'required|max:10',
            'category_id' => 'required',
            'price' => 'required',
            'quantity' => 'required'
        ]);
        try{
$dbImagePath =null;
if($request->hasFile('image')){
    $imageName = $request->file('image')->getClientOriginalName();
    $request->file('image')->storeAs('public/products/', $imageName);
    $dbImagePath = 'storage/products/'.$imageName;
}
Product::create([
    'name' => $request->name,
    'slug' => Str::slug($request->name),
    'category_id' => $request->category_id,
    'quantity' => $request->quantity,
    'price' => $request->price,
    'description' => $request->description,
    'image' => $dbImagePath,
    'status' => $request->status
]);
return redirect()->back()->with('success', 'Product create successfully!');
        }
        catch(Exception $ex){
Log::error("Product Store: ".$ex->getMessage());
return redirect()->back()->with('error', 'Sorry!, Unable to create product');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        //
        $categories = Category::all();
        return view('admin.products.edit', compact('product', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        //
        $request->validate([
         'name' => 'required',
         'category_id' => 'required',
         'price' => 'required',
         'quantity' => 'required'
        ]);
        try{
         if($request->hasFile('image')){
            $imageName = $request->file('image')->getClientOriginalName();
            $request->file('image')->storeAs('public/products/', $imageName);
            $dbImagePath = 'storage/products/'.$imageName;
            $deleteImagePath = $product->image;
            $deleteImagePath = str_replace('storage', 'public', $deleteImagePath);
            Storage::delete($deleteImagePath);
         }
         $product->name = $request->name;
         $product->slug = Str::slug($request->name);
         $product->category_id = $request->category_id;
         $product->price = $request->price;
         $product->quantity = $request->quantity;
         $product->description = $request->description;
         $product->status = $request->status;
         if(isset($dbImagePath)){
            $product->image = $dbImagePath;
         }
         $product->update();
         return redirect()->back()->with('success', 'Product update successfully!');
        }
        catch(Exception $e){
        Log::error("Product Update: ".$e->getMessage());
        return redirect()->back()->with('error', 'Something want wrong! please try again');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        try{
            $product->delete();
            return redirect()->back()->with('success', 'Product deleted successfully!');
        }
        catch(Exception $ex){
         Log::error("Product Delete: ".$ex->getMessage());
         return redirect()->back()->with('error', 'Unable to delete product');
                }
    }
}
