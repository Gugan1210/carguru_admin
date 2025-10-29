<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Country;

class Make extends Model
{
    protected $fillable = ['id', 'country_id', 'brand_name', 'logo', 'status', 'created_at', 'updated_at'];

    public function country()
    {
        return $this->belongsTo(Country::class, 'country_id', 'id');
    }
    public function carinfos()
    {
        return $this->hasMany(Carinfo::class, 'brand_id', 'id');
    }
}
