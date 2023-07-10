<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Shipper extends Model
{
    protected $table = 'shippers';
    protected $fillable = [
        'shipper_name',
        'email',
        'company',
        'first_name',
        'last_name',
        'job_title',
        'phone_number',
        'street',
        'city',
        'province',
        'zip_code',
        'country',
        'webpage',
        'image',
        'note'
    ];
}
