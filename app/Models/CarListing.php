<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CarListing extends Model
{
    protected $fillable = [
        'car_name',
        'brand',
        'year',
        'price',
        'color',
        'mileage',
        'seller_name',
        'seller_phone',
        'seller_email',
        'location',
        'status',
    ];
}