<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $table = 'orders';
    protected $fillable = [
        'employee_id',
        'customer_id',
        'shipper_id',
        'order_date',
        'payment_id',
        'shipping_cost',
        'shipping_date',
        'tax',
        'discount',
        'payment_amount'
    ];
}
