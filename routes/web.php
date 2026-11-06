<?php

use App\Http\Controllers\ClientConsentController;
use App\Http\Controllers\ContactController;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get('/', function () {
    return Inertia::render('HomePage');
})->name('home');

Route::get('/booking', function () {
    return Inertia::render('Booking');
})->name('booking');

Route::post('/consent', [ClientConsentController::class, 'store'])->name('consent.store');

// Route::inertia('/', 'Welcome')->name('home');

Route::middleware(['auth', 'verified'])->group(function () {
    Route::inertia('dashboard', 'Dashboard')->name('dashboard');
});

Route::get('/informed-consent', function () {
    return Inertia::render('Legal/InformedConsent');
})->name('InformedConsent');

Route::post('/contact', [ContactController::class, 'send'])
    ->name('contact.send');
require __DIR__.'/settings.php';
