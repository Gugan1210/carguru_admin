<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PromosInput extends Model
{
    protected $table = 'promos_discounts_inputs';
    protected $fillable = [
        'promotion_id',
        'country_id',
        'brand_id',
        'model_id',
        'body_type_id',
        'fuel_type_id',
        'price',
        'year',
        'transmission',
        'mileage',
        'color',
    ];
}
