<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\CarBrake;

class CarDiamension extends Model
{
    protected $table = 'car_diamensions';
    protected $primaryKey = 'car_make_id';
    public $incrementing = false;
    protected $keyType = 'string';
    protected $fillable = [
        'id',
        'length_mm',
        'weight_mm',
        'height_mm',
        'wheel_base_mm',
        'kerb_weight_kg',
        'fuel_tank_ltr',
        'car_make_id',
        'created_at',
        'updated_at'
    ];
    protected $casts = [
    'id' => 'integer',
    'length_mm' => 'float',
    'weight_mm' => 'float',
    'height_mm' => 'float',
    'wheel_base_mm' => 'float',
    'kerb_weight_kg' => 'float',
    'fuel_tank_ltr' => 'float',
    'car_make_id' => 'string', 
    'created_at' => 'datetime',
    'updated_at' => 'datetime',
];

}
