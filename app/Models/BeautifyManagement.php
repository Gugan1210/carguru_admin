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
    protected $casts = [
    'id' => 'integer',
    'promotion_id' => 'string',
    'car_detail_id' => 'string',

    'front_45' => 'string',
    'back_45' => 'string',
    'front_view' => 'string',
    'back_view' => 'string',
    'side' => 'string',
    'interior_front' => 'string',
    'interior_back' => 'string',
    'dashboard' => 'string',
    'speedometer' => 'string',
    'gear' => 'string',
    'engine' => 'string',
    'tyre' => 'string',
    'others' => 'string',

    'car_video' => 'string',
    'video_360' => 'string',

    'created_at' => 'datetime',
    'updated_at' => 'datetime',
];

}
