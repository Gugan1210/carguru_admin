<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\CarMakeManufacturersWarranty;

class CarWarranty extends Model
{
    protected $table = 'car_warranties';
    protected $fillable = [
        'id',
        'manufacturers_warranty',
        'cargurus_warranty',
        'road_tax_amount_rm',
        'road_tax_year',
        'car_make_id',
        'created_at',
        'updated_at',
    ];
    protected $casts = [
    'id' => 'integer',

    'manufacturers_warranty' => 'string',
    'cargurus_warranty' => 'string',
    'road_tax_amount_rm' => 'string',
    'road_tax_year' => 'string',
    'car_make_id' => 'string',

    'created_at' => 'datetime',
    'updated_at' => 'datetime',
];


    public function getManufacturersWarranty()
    {
        return $this->hasOne(CarMakeManufacturersWarranty::class, 'id', 'manufacturers_warranty');
    }

    public function getCargurusWarranty()
    {
        return $this->hasOne(CarMakeCarGurusWarranty::class, 'id', 'cargurus_warranty');
    }
}
