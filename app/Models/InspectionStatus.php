<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InspectionStatus extends Model
{
    use HasFactory;

    protected $table = 'inspection_status';

    protected $fillable = ['status', 'text', 'icon'];
    protected $casts = [
    'id' => 'integer',
    'text' => 'string',
    'icon' => 'string',
    'status' => 'string', 
    'created_at' => 'datetime',
    'updated_at' => 'datetime',
];


}