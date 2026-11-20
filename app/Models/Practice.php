<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Practice extends Model
{
    protected $fillable = [
        'title',
        'description',
        'duration',
        'icon',
        'type',
        'price',
        'audio_path',
        'video_path',
    ];
}
