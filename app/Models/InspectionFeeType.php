<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class InspectionFeeType extends Model
{

    protected $table = 'inspection_fee_type';

    protected $fillable = ['id','name', 'status'];

}