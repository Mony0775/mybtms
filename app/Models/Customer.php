<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    protected $table = 'customers';
    protected $fillable = ['customer_name', 'email', 'company', 'first_name', 'last_name', 'job_title', 'phone_number', 'street', 'city', 'province', 'zip_code', 'country', 'webpage', 'image', 'note'];
}
