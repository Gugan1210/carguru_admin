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
    protected $casts = [
    'id' => 'integer',

    'country_id' => 'integer',
    'iso2' => 'string',
    'code' => 'string',
    'symbol' => 'string',
    'decimals' => 'integer',

    'created_at' => 'datetime',
    'updated_at' => 'datetime',
];

}
