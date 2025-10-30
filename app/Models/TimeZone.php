<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TimeZone extends Model
{
    protected $table = 'time_zones';
    protected $fillable = [
        'country_id',
        'iso2',
        'zone',
        'utc_offset'
    ];
    protected $casts = [
    'id' => 'integer',
    'country_id' => 'string',
    'iso2' => 'string',
    'zone' => 'string',
    'utc_offset' => 'string',
    'created_at' => 'datetime',
    'updated_at' => 'datetime',
];

}
