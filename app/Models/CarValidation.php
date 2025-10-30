<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Models;

class CarValidation extends Model
{
       protected $table = 'car_validations';
    protected $fillable = [
        'id',
        'brand_id',
        'model_id',
        'msrp',
        'platform_discount',
        'base_mileage_per_year',
        'car_depreciation',
        'other_aging_depreciation',
        'no_accident',
        'minor_accidend',
        'major_accident',
        'severe_flooding',
    ];
    protected $casts = [
    'id' => 'integer',
    'brand_id' => 'string',
    'model_id' => 'string',
    'msrp' => 'string',
    'platform_discount' => 'string',
    'base_mileage_per_year' => 'string',
    'car_depreciation' => 'array', // longtext JSON
    'other_aging_depreciation' => 'array', // longtext JSON
    'no_accident' => 'string',
    'minor_accidend' => 'string',
    'major_accident' => 'string',
    'severe_flooding' => 'string',

    'created_at' => 'datetime',
    'updated_at' => 'datetime',
];


    public function getModel()
    {
        return $this->hasOne(Models::class, 'id', 'model_id');
    }
}
