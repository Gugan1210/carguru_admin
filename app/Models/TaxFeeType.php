<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TaxFeeType extends Model
{

    protected $table = 'tax_fee_type';

    protected $fillable = ['id','name', 'status'];

}