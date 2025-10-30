<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CarMakeEngineType extends Model
{
    
    protected $table = 'car_make_engine_types';
    protected $fillable = ['id', 'name', 'status'];
    protected $casts = [
    'id' => 'integer',
    'name' => 'string',
    'status' => 'boolean',
    'created_at' => 'datetime',
    'updated_at' => 'datetime',
];
}
