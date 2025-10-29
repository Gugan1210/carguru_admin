<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\CarMakeBrake;
use App\Models\CarMakeSuspension;
use App\Models\CarMakeSteering;
use App\Models\Feature;

class CarBrake extends Model
{
    protected $table = 'car_brakes';

    protected $primaryKey = 'car_make_id';
    public $incrementing = false;
    protected $keyType = 'string';
    protected $fillable = [
        'id',
        'brake_front',
        'brake_rear',
        'suspension_front',
        'suspension_back',
        'steering',
        'wheel_type_front',
        'wheel_type_rear',
        'wheel_type_front_rims',
        'wheel_type_rear_rims',
        'features_equipments',
        'car_make_id',
        'created_at',
        'updated_at'
    ];

    protected $casts = [
        'features_equipments' => 'array',
    ];


    public function getBrakeFront()
    {
        return $this->hasOne(CarMakeBrake::class, 'id', 'brake_front');
    }

    public function getBrakeRear()
    {
        return $this->hasOne(CarMakeBrake::class, 'id', 'brake_rear');
    }

    public function getSuspensionFront()
    {
        return $this->hasOne(CarMakeSuspension::class, 'id', 'suspension_front');
    }

    public function getSuspensionBack()
    {
        return $this->hasOne(CarMakeSuspension::class, 'id', 'suspension_back');
    }

    public function getSteering()
    {
        return $this->hasOne(CarMakeSteering::class, 'id', 'steering');
    }

    public function getFeaturesEquipmentsListAttribute()
    {
        $ids = $this->features_equipments;

        // Normalize to array
        if (is_string($ids)) {
            $ids = json_decode($ids, true) ?: [];
        }

        if (!is_array($ids)) {
            $ids = [];
        }

        // Ensure integers
        $features_ids = array_map('intval', $ids);

        return Feature::whereIn('id', $features_ids)
            ->get(['id', 'feature_name as text']);
    }



}
