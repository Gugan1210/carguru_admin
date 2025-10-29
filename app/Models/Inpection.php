<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Inpection extends Model
{
        protected $table = 'inspection';
    protected $fillable = [
        'car_category',
        'status',
        'topic',
        'area',
        'specific_area',
        'reasons',
        'allow_capture',
        'data'
    ];

    protected $casts = [
        'status'        => 'array',
        'topic'         => 'array',
        'area'          => 'array',
        'specific_area' => 'array',
        'reasons'       => 'array',
        'allow_capture' => 'array',
        'data' => 'array',
    ];


   
}
