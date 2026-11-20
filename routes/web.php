<?php

use App\Http\Controllers\ClientConsentController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\PracticeController;
use App\Http\Controllers\ServiceController;
use App\Models\Practice;
use App\Models\Service;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get('/', function () {
    return Inertia::render('HomePage', [
        'services' => Service::query()->orderBy('id')->get(),
        'practices' => Practice::query()->orderBy('id')->get(),
    ]);
})->name('home');

Route::get('/booking', [ServiceController::class, 'index'])
    ->name('booking');

Route::get('/free-practices',  [PracticeController::class, 'freePractices'])->name('free-practices');

Route::get('/paid-practices', [PracticeController::class, 'paidPractices'])->name('paid-practices');


Route::get('/practice/{id}', [PracticeController::class, 'show'])
    ->name('practice.show');

Route::post('/consent', [ClientConsentController::class, 'store'])->name('consent.store');

// Route::inertia('/', 'Welcome')->name('home');

Route::middleware(['auth', 'verified'])->group(function () {
    Route::inertia('dashboard', 'Dashboard')->name('dashboard');
});

Route::get('/informed-consent', function () {
    return Inertia::render('Legal/InformedConsent');
})->name('InformedConsent');

Route::post('/contact', [ContactController::class, 'send'])
    ->middleware('throttle:5,1')
    ->name('contact.send');
require __DIR__.'/settings.php';
