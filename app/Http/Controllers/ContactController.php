<?php

namespace App\Http\Controllers;

use App\Mail\ContactFormMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Inertia\Inertia;

class ContactController extends Controller
{
    public function send(Request $request)
    {
        $data = $request->validate([
            'surname' => 'required|string',
            'name' => 'required|string',
            'email' => 'required|string',
            'phone' => 'required|string',
            'message' => 'required|string',
            'viber' => 'nullable|string|required_without_all:telegram,whatsapp',
            'telegram' => 'nullable|string|required_without_all:viber,whatsapp',
            'whatsapp' => 'nullable|string|required_without_all:viber,telegram',
        ]);
        Mail::to(config('mail.contact_recipient'))->send(new ContactFormMail($data));
        Inertia::flash('success', 'Ваше повідомлення надіслано!');

        return back();
    }
}
