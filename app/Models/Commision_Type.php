<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Commision_Type extends Model
{

    protected $table = 'commision_type';

    protected $fillable = ['id','name', 'status'];

}