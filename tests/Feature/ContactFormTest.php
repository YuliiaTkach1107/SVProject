<?php

use App\Mail\ContactFormMail;
use Illuminate\Support\Facades\Mail;

test('requires at least one messenger contact', function () {
    Mail::fake();
    config(['mail.contact_recipient' => 'contact@example.com']);

    $this->post(route('contact.send'), [
        'surname' => 'Doe',
        'name' => 'Jane',
        'email' => 'jane@example.com',
        'phone' => '+380000000000',
        'message' => 'I have a question.',
        'viber' => '',
        'telegram' => '',
        'whatsapp' => '',
    ])->assertSessionHasErrors(['viber', 'telegram', 'whatsapp']);

    Mail::assertNothingSent();
});

test('accepts a contact through any messenger', function (array $messengerContact) {
    Mail::fake();
    config(['mail.contact_recipient' => 'contact@example.com']);

    $this->post(route('contact.send'), [
        'surname' => 'Doe',
        'name' => 'Jane',
        'email' => 'jane@example.com',
        'phone' => '+380000000000',
        'message' => 'I have a question.',
        ...$messengerContact,
    ])->assertRedirect();

    Mail::assertSent(ContactFormMail::class);
})->with([
    'Viber' => [['viber' => '@jane']],
    'Telegram' => [['telegram' => '@jane']],
    'WhatsApp' => [['whatsapp' => '+380000000000']],
]);
