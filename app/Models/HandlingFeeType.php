<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class HandlingFeeType extends Model
{

    protected $table = 'handling_fee_type';

    protected $fillable = ['id','name', 'status'];

}