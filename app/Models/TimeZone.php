<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TimeZone extends Model
{
    protected $fillable = [
        'country_id',
        'iso2',
        'zone',
        'utc_offset'
    ];
}
