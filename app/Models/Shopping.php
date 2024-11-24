<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Shopping extends Model
{
    protected $fillable = [
        'date_order',
        'date_shipping',
        'total_item',
        'total_pay',
        'status',
    ];
}
