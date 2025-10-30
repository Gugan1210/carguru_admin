<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    protected $table = 'countries';
    protected $fillable = ['iso2', 'iso3', 'country_name', 'phone_code', 'continent', 'status'];
    protected $casts = [
    'id' => 'integer',

    'iso2' => 'string',
    'iso3' => 'string',
    'country_name' => 'string',
    'phone_code' => 'string',
    'continent' => 'string',

    'status' => 'boolean',

    'created_at' => 'datetime',
    'updated_at' => 'datetime',
];


    public function getState()
    {
        return $this->belongsTo(CountryState::class, 'id', 'country_id');
    }
}
