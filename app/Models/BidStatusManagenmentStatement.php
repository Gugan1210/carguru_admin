<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Ramsey\Uuid\Type\Integer;

class BidStatusManagenmentStatement extends Model
{
    protected $table = 'bid_status_management_statements';
    protected $fillable = ['id', 'status_id', 'name'];
    
protected $casts = [
   "id"=> 'string',
   "status_id"=>'Integer',
   "name"=>'string'
];
}
