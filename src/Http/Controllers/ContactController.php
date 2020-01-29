<?php

namespace Mdbs\Contact\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Mdbs\Contact\Models\Contact;
use Mdbs\Contact\Mail\ContactMailable;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function index()
    {
    	return view('contact::contact');
    }

    public function send(Request $request)
    {
    	Mail::to(config('contact.send-email-to'))->send(new ContactMailable($request->message,$request->name));
    	Contact::create($request->all());
    	return redirect(route('contact'));
    }
}
