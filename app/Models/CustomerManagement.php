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
    protected $casts = [
    'id' => 'integer',
    'customer_id' => 'integer',
    'customer_status' => 'string',
    'name' => 'string',
    'ic_number' => 'string',
    'gender' => 'string',
    'mobile' => 'string',
    'email' => 'string',
    'address1' => 'string',
    'address2' => 'string',
    'postcode' => 'string',
    'bankname' => 'string',
    'banke_account_number' => 'string',
    'balance_in_account' => 'decimal:2',
    'profile_image' => 'string',
    'document' => 'string',
    'status' => 'boolean',
    'created_at' => 'datetime',
    'updated_at' => 'datetime',
];

}