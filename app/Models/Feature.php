<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Feature extends Model
{
    protected $table = 'features';
    protected $fillable = ['id', 'feature_name', 'status'];
    protected $casts = [
    'id' => 'integer',
    'feature_name' => 'string',
    'status' => 'boolean',

    'created_at' => 'datetime',
    'updated_at' => 'datetime',
];

}
