<?php

namespace App\Http\Controllers;

use App\Http\Requests\MailRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\SendMail;

class MailController extends Controller
{
    public function sendEmail(MailRequest $request)
    {
        $data = array(
            'email' => $request->email,
            'subject' => $request->subject,
            'message' => $request->message,
        );

        Mail::to('ryan22febrian@gmail.com')->send(new SendMail($data));

        return redirect(route('getContactPage'));
    }
}
