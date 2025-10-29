<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class CustomerActivity extends Model
{
    protected $table = 'customer_information_activity';
    protected $fillable = [
        'customer_id',
        'car_register_number',
        'payment_mode',
        'payment_category',
        'confirmation',
        'attach_receipt',
        'loanurl',
    ];
}