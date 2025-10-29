<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Business_unit extends Model
{

    protected $table = 'business_unit';

    protected $fillable = ['id','name', 'status'];

}