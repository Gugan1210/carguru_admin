<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\CountryStateCity;

class CountryState extends Model
{
    protected $table = 'country_states';
    protected $fillable = [
        'country_id',
        'state_name',
        'status'
    ];
    protected $casts = [
    'id' => 'integer',

    'country_id' => 'integer',
    'state_name' => 'string',
    'status' => 'boolean',

    'created_at' => 'datetime',
    'updated_at' => 'datetime',
];


    public function getCity()
    {
        return $this->belongsTo(CountryStateCity::class, 'state_id', 'id');
    }
}
