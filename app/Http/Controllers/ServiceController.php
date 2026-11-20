<?php

namespace App\Http\Controllers;

use App\Models\Service;
use Inertia\Inertia;

class ServiceController extends Controller
{
    public function index()
    {
        $services = Service::all();

        return Inertia::render('Booking', [
            'services' => $services,
        ]);
    }
}
