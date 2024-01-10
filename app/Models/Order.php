<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $table = 'orders';


    protected $fillable = [
        'timstamp', 'placed', 'total_price', 'total_qty'
    ];

    // Many to many relation with product_order table
    public function products(){
        return $this->belongsToMany(Product::class, 'product_orders', 'order_id', 'product_id');
    }
}
