<?php

namespace App\Http\Controllers\Client;

use App\Helper\Settings;
use App\Http\Controllers\Controller;
use App\Mail\ContactFormToAdmin;
use App\Models\ContactUs;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;

class ContactUsController extends Controller
{
    public function index(Request $request, ContactUs $contactUs)
    {

        $request->validate(
            [   'name' => 'required|string',
                'subject' => 'required|string',
                'text' => 'required|string',
                'check' => 'accepted'
          ]
        );

        $contactUs->name = $request->input('name');
        $contactUs->subject = $request->input('subject');
        $contactUs->text = $request->input('text');
        $contactUs->ip = $request->ip;
        $contactUs->urlRef = $request->url;
        $contactUs->save();
        Mail::to(Settings::get("admin_email"))->send(new ContactFormToAdmin($contactUs));
        return redirect()->back()->with('Success','Your message has been sent');
    }
}
