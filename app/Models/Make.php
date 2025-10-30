<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Country;

class Make extends Model
{
     protected $table = 'makes';
    protected $fillable = ['id', 'country_id', 'brand_name', 'logo', 'status', 'created_at', 'updated_at'];
    protected $casts = [
    'id' => 'integer',

    'brand_name' => 'string',
    'logo' => 'string',
    'status' => 'boolean',
    'country_id' => 'integer',

    'created_at' => 'datetime',
    'updated_at' => 'datetime',
];


    public function country()
    {
        return $this->belongsTo(Country::class, 'country_id', 'id');
    }
    public function carinfos()
    {
        return $this->hasMany(Carinfo::class, 'brand_id', 'id');
    }
}
