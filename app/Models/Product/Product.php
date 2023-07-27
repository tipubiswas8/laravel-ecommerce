<?php

namespace App\Models\Product;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'slug', 'category_id', 'price', 'quantity', 'image', 'description', 'status'];

    public function category(){
        return $this->belongsTo(Category::class);
    }

    
    public function productCategory(){
        return $this->hasOne(Category::class,'id','category_id');
    }
}
