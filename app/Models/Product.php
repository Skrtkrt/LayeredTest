<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'name',
        'amount',
        'quantity',
        'flavor',
        'price',
        'payment_id',
        'today_date',
        'final_date',
        'reservation_date',
    ];
}
