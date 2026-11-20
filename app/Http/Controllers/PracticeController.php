<?php

namespace App\Http\Controllers;

use App\Models\Practice;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Inertia\Response;

class PracticeController extends Controller
{
    public function index()
    {
        $practices = Practice::all();

        return Inertia::render('Practices', [
            'practices' => $practices,
        ]);
    }

    public function show(Request $request, string $id): Response
    {
        $backUrl = match ($request->query('from')) {
            'home' => '/#practices_section',
            'free' => '/free-practices',
            'paid' => '/paid-practices',
            default => '/',
        };


        return Inertia::render('Practice', [
            'practice' => Practice::findOrFail($id),
            'backUrl' => $backUrl,
        ]);
    }

    public function freePractices(): Response
    {
        return Inertia::render('Free', [
            'practices' => Practice::query()->where('type','free')->orderBy('id')->get(),
        ]);

    }
    public function paidPractices(): Response
    {
        return Inertia::render('Paid', [
            'practices' => Practice::query()->where('type','paid')->orderBy('id')->get(),
        ]);

    }
}
