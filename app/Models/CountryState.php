<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\CountryStateCity;

class CountryState extends Model
{
    protected $fillable = [
        'country_id',
        'state_name',
        'status'
    ];

    public function getCity()
    {
        return $this->belongsTo(CountryStateCity::class, 'state_id', 'id');
    }
}
