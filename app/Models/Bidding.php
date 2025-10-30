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
    'id' => 'integer',

    'bid_increment' => 'string', // longtext
    'bid_session_duration' => 'string',
    'timing_each_bid' => 'string',
    'countdown_first_interval' => 'string',
    'countdown_second_interval' => 'string',
    'countdown_third_interval' => 'string',
    'preview_before_bid' => 'string',
    'cooling_period' => 'string',
    'resbid_bid_session' => 'string',
    'resbid_attempts' => 'string',
    'resbid_price_reduction' => 'string',

    'bid_schedule' => 'string', // longtext (datetime stored in text)
    
    'created_at' => 'datetime',
    'updated_at' => 'datetime',
];

}
