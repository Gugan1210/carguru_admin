<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Unit extends Model
{
    protected $fillable = [
        'country_id',
        'iso2',
        'length_system',
        'length_symbol',
        'weight_system',
        'weight_symbol',
    ];
}
