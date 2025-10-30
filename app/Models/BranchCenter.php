<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BranchCenter extends Model
{
    protected $table = 'branch_centers';
    protected $fillable = [
        'country_id',
        'state_id',
        'city_id',
        'branch_type',
        'name',
        'status',
    ];
    protected $casts = [
    'country_id' => 'integer',
    'state_id' => 'integer',
    'city_id' => 'integer',
    'branch_type' => 'string',
    'name' => 'string',
    'status' => 'boolean',
    'created_at' => 'datetime',
    'updated_at' => 'datetime',
];

    public function country()
    {
        return $this->belongsTo(Country::class, 'country_id');
    }

    public function states()
    {
        return $this->belongsTo(CountryState::class, 'state_id');
    }

    public function city()
    {
        return $this->belongsTo(CountryStateCity::class, 'city_id');
    }
    public function getBranchType()
    {
        return $this->hasOne(BranchType::class, 'id', 'branch_type');
    }
}
