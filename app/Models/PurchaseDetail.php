<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PurchaseDetail extends Model
{
    protected $table = 'purchase_details';
    protected $fillable = [
        'product_id',
        'price',
        'quantity',
        'discount',
        'total_price'
    ];
}
