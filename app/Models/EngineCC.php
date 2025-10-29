<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EngineCC extends Model
{
    protected $table = 'engineccs';
    protected $fillable = ['id', 'name', 'status'];
}
