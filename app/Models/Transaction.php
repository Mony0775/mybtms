<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    protected $table = 'transactions';
    protected $fillable = [
        'employee_id',
        'customer_id',
        'order_date',
        'shipper_id',
        'supplier_id',
        'payment_id',
        'shipping_cost',
        'shipping_date',
        'tax',
        'product_id',
        'price',
        'quantity',
        'discount',
        'total_price',
        'type',
        'transaction_date',
        'trx_code'
    ];
}
