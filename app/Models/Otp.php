<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Otp extends Model
{
    protected $table = 'otps';

    protected $fillable = [
        'phone',
        'otp',
        'transaction_id',
        'expires_at'
    ];

    public $timestamps = true;
}
