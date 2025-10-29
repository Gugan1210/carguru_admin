<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Make;

class Models extends Model
{
    protected $table = 'models';
    protected $fillable = ['id', 'brand_id', 'model_name', 'status', 'created_at', 'updated_at'];

    public function brand()
    {
        return $this->belongsTo(Make::class, 'brand_id', 'id');
    }

}
