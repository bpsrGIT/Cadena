<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Listing extends Model
{
    use HasFactory;

    protected $fillable = [
        'category',
        'sub_category',
        'brand',
        'product_model',
        'product_name',
        'price',
        'quantity',
        'description',
        'is_active',
        'no_of_views',
        'no_of_wishlist',
        'images'
    ];

    protected $hidden = [

    ];
}
