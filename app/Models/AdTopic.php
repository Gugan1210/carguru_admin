<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AdTopic extends Model
{
    protected $table = 'adtopic';
    protected $fillable = ['id', 'ad_placement_id', 'name', 'status'];
        protected $casts = [
        'id' => 'integer',
        'ad_placement_id' => 'integer',
        'name' => 'string',
        'status' => 'boolean'
    ];
}
