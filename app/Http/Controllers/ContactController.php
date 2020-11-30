<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Notifications\ContactFormMessage;
use App\Http\Controllers\Controller;
use App\Http\Requests\ContactFormRequest;
use App\Models\Recipient;

class ContactController extends Controller
{
    public function ContactView() {
        return view('/contact/contact');
    }

    public function MailContactForm(ContactFormRequest $message, Recipient $recipient) {
        $recipient->notify(new ContactFormMessage($message));

        return redirect()->back()->with('message', 'Thank you for contacting Lots of Pots! We will be back in touch soon.');
    }


}
