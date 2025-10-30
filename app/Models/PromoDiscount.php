<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\PromotionExpiryTrait;

class PromoDiscount extends Model
{
    use HasFactory, PromotionExpiryTrait;
    protected $table = 'promos_discounts';
    protected $fillable = [
        'promotion_id',
        'promotion_name',
        'promotion_detail',
        'start_date',
        'end_date',
        'start_time',
        'end_time',
        'car_category',
        'shortlist_car_promo_input',
        'car_detail_id_promo',
        'registration_number',
        'discount',
        'display',
        'discount_format',
        'percentage_discount',
        'amount_discount',
        'is_expired',
    ];
    protected $casts = [
    'id' => 'integer',
    'promotion_id' => 'string',
    'promotion_name' => 'string',
    'promotion_detail' => 'string',

    // Date & Time
    'start_date' => 'date',
    'end_date' => 'date',
    'start_time' => 'datetime:H:i:s',
    'end_time' => 'datetime:H:i:s',

    'car_category' => 'string',

    // Longtext fields (usually JSON)
    'shortlist_car_promo_input' => 'array',
    'car_detail_id_promo' => 'array',

    'count' => 'integer',
    'status' => 'integer',
    'is_approved' => 'integer',

    'created_at' => 'datetime',
    'updated_at' => 'datetime',

    'registration_number' => 'string',
    'is_expired' => 'boolean',
];


    public function carCategory()
    {
        return $this->hasOne(CarDetailCategory::class, 'key', 'car_category');
    }
}
