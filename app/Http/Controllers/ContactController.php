<?php

namespace App\Http\Controllers;

use Illuminate\View\View;
use App\Http\Requests\ContactFormRequest;
use App\Models\Contact;
use Illuminate\Support\Facades\DB;

class ContactController extends Controller

{
    public function index(): View
    {
        return view('contact');
    }

    public function create(ContactFormRequest $request) {
        try {
            DB::transaction(function () use ($request) {
                $contact = Contact::create($request->validated());

                if ($request->input('noEmail') === null || $request->input('noEmail') !== 'true') {
                    $this->sendEmail(2, 'contact.arcadiazoo@gmail.com', [ "EMAIL" => $contact->email, "SUBJECT" => $contact->subject, "CONTENT" => $contact->content ]);
                }
            });
        } catch (\Throwable $th) {
            return to_route('contacts')->with('error', 'Une erreur est survenue');
        }

        return to_route('contacts')->with('success', 'Votre message a été envoyé');
    }
}
