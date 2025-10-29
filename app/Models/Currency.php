<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Currency extends Model
{
    protected $table = 'currency';
    protected $fillable = [
        'country_id',
        'iso2',
        'code',
        'symbol',
        'decimals',
    ];
}
