<?php

namespace App\Http\Controllers;

use App\Models\ClientConsent;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class ClientConsentController extends Controller
{
    public function store(Request $request): JsonResponse
    {
        $validated = $request->validate([
            'serviceId' => ['required', 'string', 'max:100'],
            'termsAccepted' => ['required', 'accepted'],
            'consentAccepted' => ['required', 'accepted'],
        ]);

        $consent = ClientConsent::create([
            'service_id' => $validated['serviceId'],
            'terms_version' => '1.0',
            'consent_version' => '1.0',
            'terms_accepted' => true,
            'consent_accepted' => true,
            'accepted_at' => now(),
        ]);

        return response()->json([
            'success' => true,
            'consentId' => $consent->id,
        ], 201);
    }
}
