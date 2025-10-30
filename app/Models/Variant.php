<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Models;
use App\Models\Make;

class Variant extends Model
{
    protected $table = 'variants';
    protected $fillable = ['id', 'variant_name', 'brand_id', 'model_id', 'status', 'created_at', 'updated_at'];
    protected $casts = [
    'id' => 'integer',
    'brand_id' => 'integer',
    'model_id' => 'integer',
    'variant_name' => 'string',
    'status' => 'boolean',
    'created_at' => 'datetime',
    'updated_at' => 'datetime',
];

    public function brand()
    {
        return $this->belongsTo(Make::class, 'brand_id', 'id');
    }

    public function model()
    {
        return $this->belongsTo(Models::class, 'model_id', 'id');
    }

}
