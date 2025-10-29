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

    public function carCategory()
    {
        return $this->hasOne(CarDetailCategory::class, 'key', 'car_category');
    }
}
