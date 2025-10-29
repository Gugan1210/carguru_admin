<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CarDetailCategory extends Model
{
    protected $table = 'car_detail_category';
    protected $fillable = ['id', 'key', 'name', 'image', 'status'];
}
