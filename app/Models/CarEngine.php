<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\CarDiamension;
use App\Models\CarMakeMadeYear;
use App\Models\CarMakeEngineType;

class CarEngine extends Model
{
    protected $table = 'car_engines';
    protected $primaryKey = 'car_makes_id';
    public $incrementing = false;
    protected $keyType = 'string';
    protected $fillable = [
        'id',
        'engine_cc',
        'engine_type',
        'compression_ratio',
        'peak_power_kw',
        'peak_torque_nm',
        'car_makes_id',
        'created_at',
        'updated_at'
    ];
    protected $casts = [
    'id' => 'integer',
    'engine_cc' => 'string',
    'engine_type' => 'string',
    'compression_ratio' => 'string',
    'peak_power_kw' => 'string',
    'peak_torque_nm' => 'string',
    'car_makes_id' => 'string',
    'created_at' => 'datetime',
    'updated_at' => 'datetime',
];


    public function getEngineCC()
    {
        return $this->hasOne(CarMakeMadeYear::class, 'id', 'engine_cc');
    }

    public function getEngineType()
    {
        return $this->hasOne(CarMakeEngineType::class, 'id', 'engine_type');
    }
}
