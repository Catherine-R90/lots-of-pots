<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Notifications\ContactFormMessage;
use App\Http\Controllers\Controller;
use App\Http\Requests\ContactFormRequest;
use App\Models\Recipient;
use Jenssegers\Agent\Agent;

class ContactController extends Controller
{
    public function ContactView() {
        $agent = new Agent;

        if($agent->isDesktop()) {
            return view('/contact/contact');
        }
        if($agent->isMobile()) {
            return view('/contact/mobile_contact');
        }
    }

    public function MailContactForm(ContactFormRequest $message, Recipient $recipient) {
        $recipient->notify(new ContactFormMessage($message));

        return redirect()->back()->with('message', 'Thank you for contacting Lots of Pots! We will be back in touch soon.');
    }


}
