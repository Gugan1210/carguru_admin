<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CarMakeInteriorColor extends Model
{
     protected $table = 'car_make_interior_colors';
    protected $fillable = ['id', 'name', 'color', 'status'];
    protected $casts = [
    'id' => 'integer',
    'name' => 'string',
    'color' => 'string',
    'status' => 'boolean',
    'created_at' => 'datetime',
    'updated_at' => 'datetime',
];
}
