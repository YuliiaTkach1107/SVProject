<?php

namespace App\Http\Controllers;

use App\Mail\ContactFormMail;
use App\Models\ContactDetail;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Inertia\Inertia;

class ContactController extends Controller
{
    public function index(): JsonResponse
    {
        return response()->json(ContactDetail::all());
    }

    public function send(Request $request): RedirectResponse
    {
        $data = $request->validate([
            'surname' => 'required|string|max:100',
            'name' => 'required|string|max:100',
            'email' => 'required|string|email|max:254',
            'phone' => 'required|string|max:30',
            'message' => 'required|string|max:5000',
            'viber' => 'nullable|string|required_without_all:telegram,whatsapp|max:100',
            'telegram' => 'nullable|string|required_without_all:viber,whatsapp|max:100',
            'whatsapp' => 'nullable|string|required_without_all:viber,telegram|max:100',
        ]);
        Mail::to(config('mail.contact_recipient'))->send(new ContactFormMail($data));
        Inertia::flash('success', 'Ваше повідомлення надіслано!');

        return back();
    }
}
