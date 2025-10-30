<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CarMakeConsumption extends Model
{
    protected $table = 'car_make_consumptions';
    protected $fillable = ['id', 'name', 'status'];
    protected $casts = [
    'id' => 'integer',
    'name' => 'string',
    'status' => 'boolean',
    'created_at' => 'datetime',
    'updated_at' => 'datetime',
];
}
