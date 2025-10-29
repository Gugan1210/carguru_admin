<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\AdPlacement;
use App\Models\AdTopic;

class Advertisement extends Model
{
    //  use HasFactory;

    // Table name (optional if it matches 'advertisements')
    protected $table = 'advertisements';

    // Fillable fields - database column names
    protected $fillable = [
        'banner_id',
        'set',
        'banner_web',
        'banner_mob',
        'location',
        'status',
        'ad_placement',
        'ad_topic',
        'headline_content_text',
        'promotion_id',
        'is_marqee'
    ];

    public function getAdPlacement()
    {
        return $this->hasOne(AdPlacement::class, 'id', 'ad_placement');
    }

    public function getAdTopic()
    {
        return $this->hasOne(AdTopic::class, 'id', 'ad_topic');
    }
}
