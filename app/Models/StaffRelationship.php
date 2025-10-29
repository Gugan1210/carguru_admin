<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class StaffRelationship extends Model
{

    protected $table = 'staff_relationship';

    protected $fillable = ['id', 'name', 'status'];

}