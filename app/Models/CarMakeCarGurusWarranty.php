<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CarMakeCarGurusWarranty extends Model
{
    protected $table = 'car_make_cargurus_warranties';
    protected $fillable = ['id', 'name', 'status'];
}
