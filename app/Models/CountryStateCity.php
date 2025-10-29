<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CountryStateCity extends Model
{
    protected $fillable = [
        'country_id',
        'state_id',
        'city_name',
        'lat',
        'lng',
        'status',
    ];

    public function getState()
    {
        return $this->belongsTo(CountryState::class, 'id', 'state_id');
    }
}
