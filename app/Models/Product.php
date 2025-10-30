<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class Product extends Model
{

    protected $table = 'products';
    protected $fillable = [
        'name',
        'detail'
    ];
    protected $casts = [
    'id' => 'integer',
    'name' => 'string',
    'detail' => 'string',
    'created_at' => 'datetime',
    'updated_at' => 'datetime',
];

}
