<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Language extends Model
{

    protected $table = 'languages';
        protected $fillable = [
        'country_id',
        'iso2',
        'code',
        'name',
        'is_default',
    ];
    protected $casts = [
    'id' => 'integer',

    'country_id' => 'integer',
    'iso2' => 'string',
    'code' => 'string',
    'name' => 'string',
    'is_default' => 'boolean',

    'created_at' => 'datetime',
    'updated_at' => 'datetime',
];

}
