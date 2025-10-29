<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OtherFeeType extends Model
{

    protected $table = 'other_fee_type';

    protected $fillable = ['id','name', 'status'];

}