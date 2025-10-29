<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BeautifyManagement extends Model
{
    protected $table = "beautify_managements";
    protected $fillable = [
        'promotion_id',
        'car_detail_id',
        'front_45',
        'back_45',
        'front_view',
        'back_view',
        'side',
        'interior_front',
        'interior_back',
        'dashboard',
        'speedometer',
        'gear',
        'engine',
        'tyre',
        'others',
        'car_video',
        'video_360',
    ];
}
