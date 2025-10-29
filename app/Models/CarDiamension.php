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

}
