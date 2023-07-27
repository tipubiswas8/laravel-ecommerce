<?php

namespace App\Models\Order;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Product\Product;

class Myorder extends Model
{
    use HasFactory;
    protected $table = 'my_orders';
    protected $guarded = [];

    public function product(){
        return $this->hasOne(Product::class, 'id', 'product_id');
    }
}
