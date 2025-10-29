<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Language extends Model
{
    protected $fillable = [
        'country_id',
        'iso2',
        'code',
        'name',
        'is_default',
    ];
}
