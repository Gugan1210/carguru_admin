<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Fee_Tax extends Model
{
    protected $table = 'fee_tax';
    protected $fillable = [
        'booking_amount',
        'handling_fee',
        'inspection_fee',
        'platform_fee',
        'platform_fee_more_than',
        'platform_fee_chargeable_fee',
        'dealers_fee',
        'other_type_fee',
        'other_type_amount',
        'others_fee',
        'tax_fee',
    ];

    protected $casts = [
        'handling_fee' => 'array',
        'inspection_fee' => 'array',
        'platform_fee' => 'array',
        'dealers_fee' => 'array',
        'others_fee' => 'array',
        'tax_fee' => 'array',
    ];
}
