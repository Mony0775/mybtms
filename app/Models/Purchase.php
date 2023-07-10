<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Purchase extends Model
{
    protected $table = 'purchases';
    protected $fillable = [
        'employee_id',
        'supplier_id',
        'shipper_id',
        'payment_id',
        'product_id',
        'shipping_cost',
        'shipping_date',
        'tax',
        'total'
    ];
}
