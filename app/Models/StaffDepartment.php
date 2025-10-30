<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class StaffDepartment extends Model
{
    protected $table = 'staff_departments';
    protected $fillable = [
        'name',
        'status'
    ];
       protected $casts = [
    'id' => 'integer',
    'name' => 'string',
    'status' => 'boolean',
    'created_at' => 'datetime',
    'updated_at' => 'datetime',
];
}
