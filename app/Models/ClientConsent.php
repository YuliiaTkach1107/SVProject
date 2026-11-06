<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ClientConsent extends Model
{
    protected $fillable = [

        'service_id',
        'terms_version',
        'consent_version',
        'terms_accepted',
        'consent_accepted',
        'accepted_at',
        'booking_uid',
    ];

    protected function casts(): array
    {
        return [
            'terms_accepted' => 'boolean',
            'consent_accepted' => 'boolean',
            'accepted_at' => 'datetime',
        ];
    }
}
