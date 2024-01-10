<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $hidden = ['pivot'];

    protected $table = 'products';

    protected $fillable = [
        'category', 'brand', 'name', 'price', 'qty', 'img_url'
    ];
}
