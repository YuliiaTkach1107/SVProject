<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ContactDetail extends Model
{
    protected $fillable = [
        'icon',
        'contact_detail',
        'url',
        'type',
    ];
}
