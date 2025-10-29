<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Bidding extends Model
{
    //  use HasFactory;

    // Table name (optional if it matches 'bidding')
    protected $table = 'bidding';

    // Fillable fields - database column names
    protected $fillable = [
        'bid_increment',
        'bid_session_duration',
        'timing_each_bid',
        'countdown_first_interval',
        'countdown_second_interval',
        'countdown_third_interval',
        'preview_before_bid',
        'cooling_period',
        'resbid_bid_session',
        'resbid_attempts',
        'resbid_price_reduction',
        'bid_schedule',
        'carmake',
        'deposite_value',
        'status_management'
    ];

    protected $casts = [
        'bid_increment' => 'array',
        'bid_schedule' => 'array',
        'carmake' => 'array',
        'status_management' => 'array'
    ];
}
