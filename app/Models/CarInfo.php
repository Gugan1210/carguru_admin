<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use App\Models\CarDetailCategory;
use App\Models\CarAccident;
use App\Models\CarDetailRegistrationType;
use App\Models\CarMakeExteriorColor;
use App\Models\CarMakeInteriorColor;
use App\Models\CarMake;

class CarInfo extends Model
{
    protected $fillable = [
        'id',
        'car_detail_id',
        'car_info_category',
        'car_info_price',
        'car_info_location',
        'brand_id',
        'model_id',
        'variant_id',
        'car_info_fuel_type',
        'car_info_registration_type',
        'car_info_registration_number',
        'car_info_registration_date',
        'car_info_car_make_year',
        'car_info_exterior_color',
        'interior_color',
        'number_of_keys',
        'engine_number',
        'chassis_number',
        'mileage',
        'isSold',
        'status'
    ];

    public function getCarDetailAccident()
    {
        return $this->hasOne(CarAccident::class, 'car_detail_id', 'car_detail_id');
    }

    public function getCarDetailCategory()
    {
        return $this->hasOne(CarDetailCategory::class, 'key', 'car_info_category');
    }
    public function getVariant()
    {
        return $this->hasOne(Variant::class, 'id', 'variant_id');
    }
    public function getCountry()
    {
        return $this->hasOne(Country::class, 'id', 'car_info_location');
    }

    public function getRegistrationType()
    {
        return $this->hasOne(CarDetailRegistrationType::class, 'id', 'car_info_registration_type');
    }

    public function getExteriorColor()
    {
        return $this->hasOne(CarMakeExteriorColor::class, 'color', 'car_info_exterior_color');
    }

    public function getInteriorColor()
    {
        return $this->hasOne(CarMakeInteriorColor::class, 'color', 'interior_color');
    }

    public function getCarMake()
    {
        return $this->hasOne(CarMake::class, 'variant_id', 'variant_id');
    }
    public function getBranchCenter()
    {
        return $this->hasOne(BranchCenter::class, 'id', 'car_info_location');
    }
    public function make()
    {
        return $this->belongsTo(Make::class, 'id', 'brand_id');
    }
    public function getCarSelected()
    {
        return $this->belongsTo(CarSelectedPromos::class, 'car_detail_id', 'car_detail_id');
    }
}
