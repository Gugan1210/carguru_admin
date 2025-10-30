<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CountryStateCity extends Model
{
    protected $table = 'country_state_cities';
    protected $fillable = [
        'country_id',
        'state_id',
        'city_name',
        'lat',
        'lng',
        'status',
    ];
    protected $casts = [
    'id' => 'integer',

    'country_id' => 'integer',
    'state_id' => 'integer',
    'city_name' => 'string',
    'lat' => 'string',
    'lng' => 'string',
    'status' => 'boolean',

    'created_at' => 'datetime',
    'updated_at' => 'datetime',
];


    public function getState()
    {
        return $this->belongsTo(CountryState::class, 'id', 'state_id');
    }
}
