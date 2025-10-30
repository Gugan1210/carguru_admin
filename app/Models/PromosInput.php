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
    protected $casts = [
    'id' => 'integer',

    'promotion_id' => 'string',
    'country_id' => 'string',
    'brand_id' => 'string',
    'body_type_id' => 'string',
    'fuel_type_id' => 'string',

    // longtext (JSON filters)
    'price' => 'array',
    'year' => 'array',
    'mileage' => 'array',

    'transmission' => 'string',
    'color' => 'string',

    'model_id' => 'string',

    'created_at' => 'datetime',
    'updated_at' => 'datetime',
];

}
