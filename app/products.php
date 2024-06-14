<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class products extends Model
{
    protected $table = 'products';
    protected $primaryKey = 'product_id';  // specify the primary key


    protected $fillable = [
        'product_id',
        'product_name',
        'product_stock',
        'product_category',
        'product_price',
        'product_image',
        'listing_date',
    ];
}
