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
    protected $casts = [
    'id' => 'integer',
    'car_detail_id' => 'string',
    'owner' => 'string',
    'usage' => 'string',
    'car_accident' => 'string',
    'flood_car' => 'string',
    'manufacturers_warranty' => 'string',
    'cargurus_warranty' => 'string',
    'road_tax_amount' => 'string',
    'road_tax_year' => 'string',
    'inspector_feedback_comment' => 'string',
    'carguru_spotlight_header_copy' => 'string',
    'carguru_spotlight_body_copy' => 'string',
    'voc_document' => 'string',
    'roadtax_document' => 'string',
    'picture_of_keys' => 'string',
    'others' => 'string',
    'created_at' => 'datetime',
    'updated_at' => 'datetime',
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
