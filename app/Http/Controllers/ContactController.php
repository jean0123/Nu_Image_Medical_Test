<?php

namespace App\Http\Controllers;

use App\Mail\ContactFormSubmitted;
use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;


class ContactController extends Controller
{
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'phone' => 'nullable',
            'question_comments' => 'nullable',
        ]);

        $contact = Contact::create($validatedData);

        Mail::to('ally@nuimagemedical.com')->send(new ContactFormSubmitted($contact));

        return response()->json(['message' => 'Form submitted successfully']);
    }
}