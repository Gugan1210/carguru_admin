<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Models;

class CarValidation extends Model
{
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

    public function getModel()
    {
        return $this->hasOne(Models::class, 'id', 'model_id');
    }
}
