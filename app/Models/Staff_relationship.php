<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class staff_relationship extends Model
{

    protected $table = 'staff_relationship';

    protected $fillable = ['id', 'name', 'status'];

}