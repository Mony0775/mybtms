<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = 'products';
    protected $fillable = [
        'product_name',
        'product_description',
        'supplier_id',
        'standard_price',
        'sale_price',
        'image',
        'alert_stock'
    ];
}
