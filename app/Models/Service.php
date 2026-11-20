<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    protected $fillable = [
        'title',
        'subtitle',
        'duration',
        'summary',
        'description',
        'price',
        'price_note',
        'booking_url',
    ];
}
