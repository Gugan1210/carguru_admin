<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BidStatusManagenmentStatus extends Model
{
    protected $table = 'bid_status_management_status';
    protected $fillable = ['id', 'name'];
    protected $casts=[
        "id"=>'integer',
        "name"=>'string'

    ];

}
