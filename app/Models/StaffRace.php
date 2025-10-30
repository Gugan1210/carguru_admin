<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class StaffRace extends Model
{
    protected $table = 'staff_races';
    protected $fillable = ['id', 'name', 'status'];
    protected $casts = [
    'id' => 'integer',
    'name' => 'string',
    'status' => 'boolean',
    'created_at' => 'datetime',
    'updated_at' => 'datetime',
];
}
