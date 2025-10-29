<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Models;
use App\Models\Make;

class Variant extends Model
{
    protected $fillable = ['id', 'variant_name', 'brand_id', 'model_id', 'status', 'created_at', 'updated_at'];

    public function brand()
    {
        return $this->belongsTo(Make::class, 'brand_id', 'id');
    }

    public function model()
    {
        return $this->belongsTo(Models::class, 'model_id', 'id');
    }

}
