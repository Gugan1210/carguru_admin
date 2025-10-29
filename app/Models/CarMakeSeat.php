<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CarMakeSeat extends Model
{
    protected $table = 'car_make_seats';
    protected $fillable = ['id', 'name', 'status'];
}
