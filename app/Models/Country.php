<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    protected $table = 'countries';
    protected $fillable = ['iso2', 'iso3', 'country_name', 'phone_code', 'continent', 'status'];

    public function getState()
    {
        return $this->belongsTo(CountryState::class, 'id', 'country_id');
    }
}
