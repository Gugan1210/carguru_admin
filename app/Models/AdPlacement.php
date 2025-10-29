<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AdPlacement extends Model
{
    protected $table = 'adplacement';
    protected $fillable = ['id', 'name', 'status'];
}
