<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BodyType extends Model
{
    protected $fillable = ['id', 'name', 'image', 'status'];
protected $casts = [
    'id' => 'integer',
    'name' => 'string',
    'status' => 'boolean',
    'image' => 'string',
    'created_at' => 'datetime',
    'updated_at' => 'datetime',
];
}
