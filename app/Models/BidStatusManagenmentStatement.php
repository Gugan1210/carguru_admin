<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BidStatusManagenmentStatement extends Model
{
    protected $table = 'bid_status_management_statements';
    protected $fillable = ['id', 'status_id', 'name'];
}
