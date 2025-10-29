<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DealerFeeType extends Model
{

    protected $table = 'dealer_fee_type';

    protected $fillable = ['id','name', 'status'];

}