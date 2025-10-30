<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CarDetailCategory extends Model
{
    protected $table = 'car_detail_category';
    protected $fillable = ['id', 'key', 'name', 'image', 'status'];
    protected $casts = [
    'id' => 'integer',
    'name' => 'string',
    'status' => 'boolean',
    'key' => 'string',
    'image' => 'string',
    'created_at' => 'datetime',
    'updated_at' => 'datetime',
];
}
