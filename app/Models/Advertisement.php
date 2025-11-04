<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Advertisement extends Model
{
    protected $table = 'advertisements';

    protected $fillable = [
        'banner_id',
        'set',                     // JSON array of banners
        'status',
        'ad_placement',
        'ad_topic',
        'headline_content_text',    // JSON array of headlines
        'promotion_id',
        'is_marqee'
    ];

    // Casts for JSON and boolean fields
    protected $casts = [
        'banner_id' => 'integer',
        'set' => 'array',                     // store and retrieve as array
        'status' => 'boolean',
        'ad_placement' => 'integer',
        'ad_topic' => 'integer',
        'headline_content_text' => 'array',   // store and retrieve as array
        'promotion_id' => 'integer',
        'is_marqee' => 'boolean',
    ];

    // Relationships
    public function adPlacement()
    {
        return $this->belongsTo(AdPlacement::class, 'ad_placement', 'id');
    }

    public function adTopic()
    {
        return $this->belongsTo(AdTopic::class, 'ad_topic', 'id');
    }
}
