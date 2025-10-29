<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class CustomerManagement extends Model
{
    protected $table = 'customer_information';
    protected $fillable = [
        'customer_id',
        'customer_status',
        'name',
        'ic_number',
        'gender',
        'mobile',
        'email',
        'address1',
        'address2',
        'postcode',
        'bankname',
        'banke_account_number',
        'balance_in_account',
        'profile_image',
        'document',
    ];
}