<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\CarInfo;
use App\Models\PromoDiscount;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class CarSelectedPromos extends Model
{
    use HasFactory;
    protected $table = 'car_selected_promos';
    protected $fillable = [
        'promotion_id',
        'car_detail_id',
        'transmission',
        'is_expired',
    ];
    protected $casts = [
    'id' => 'integer',
    'promotion_id' => 'string',
    'car_detail_id' => 'string',
    'transmission' => 'string',
    'is_expired' => 'boolean',
    'created_at' => 'datetime',
    'updated_at' => 'datetime',
];

    public function carDetail()
    {
        return $this->hasOne(CarInfo::class, 'car_detail_id', 'car_detail_id');
    }

    public function getCarDiscount()
    {
        return $this->hasOne(PromoDiscount::class, 'promotion_id', 'promotion_id');
    }
}
