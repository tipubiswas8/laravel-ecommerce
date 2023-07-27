<?php

namespace App\Http\Controllers\Admin\Product;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Log;
use Exception;

class CategoryController extends Controller
{
public function index(){
    $categories = DB::table('categories')->get();
   // dd($categories);
   // return $categories;
   return view('admin.categories.index', ['categories' => $categories]);
}

public function create(){
    return view('admin.categories.create');
}

public function store(Request $request){
    $request->validate([
        'name' => 'required|max:10'
    ]);
    try{
DB::table('categories')->insert([
    'name' => $request->name,
    'slug' => Str::slug($request->name),
]
);
return redirect()->route('categories.index');
// return redirect()->back()->with('success', 'Data insert success');
    }
  catch(Exception $ex){
    Log::error("Category store".$ex->getMessage());
return redirect()->back()->with('error', 'Something went wrong! Please try again');
    }
}

public function edit($id){
    $category = DB::table('categories')->where('id', $id)->get();
   // return $category;
    return view('admin.categories.edit', ['category' => $category]);
}

public function update(Request $request, $id){
    $request->validate([
            'name' => 'required|max:10',
        ]);
        try{
$category = DB::table('categories')
->where('id', $id)
->update([
    'name' => $request->name,
    'slug' => Str::slug($request->name)
]);
return redirect()->route('categories.index');
// return redirect()->back()->with('success', 'Category updated successfully');
        }
        catch(Exception $e){
Log::error("Category update".$e->getMessage());
return redirect()->back()->with('error', 'Something went wrong! please try again!');
        }
}

public function destroy($id){
    try{
        DB::table('categories')
        ->where('id', $id)
        ->delete();
        return redirect()->back()->with('success', 'Category deleted successfully');
    }
    catch(Exception $ex){
        Log::error('Category destroy'.$ex->getMessage());
        return redirect()->back()->with('error', 'Unable to delete category! please try again');
    }
}
}
