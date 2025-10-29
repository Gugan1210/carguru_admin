<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\CarDetailUsage;
use App\Models\CarMakeManufacturersWarranty;
use App\Models\CarMakeCarGurusWarranty;

class CarAccident extends Model
{
    protected $fillable = [
        'id',
        'car_detail_id',
        'owner',
        'usage',
        'car_accident',
        'flood_car',
        'manufacturers_warranty',
        'cargurus_warranty',
        'road_tax_amount',
        'road_tax_year',
        'inspector_feedback_comment',
        'carguru_spotlight_header_copy',
        'carguru_spotlight_body_copy',
        'voc_document',
        'roadtax_document',
        'picture_of_keys',
        'others'
    ];

    public function getUsage()
    {
        return $this->hasOne(CarDetailUsage::class, 'id', 'usage');
    }

    public function getManufacturersWarranty()
    {
        return $this->hasOne(CarMakeManufacturersWarranty::class, 'id', 'manufacturers_warranty');
    }

    public function getcargurus_warranty()
    {
        return $this->hasOne(CarMakeCarGurusWarranty::class, 'id', 'cargurus_warranty');
    }
}
