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
    
// création d'un nouveau contact dans la Base de données (uniquement si tous les champs sont valides)
 // envoi de l'email 
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







// Cette méthode create traite la soumission d'un formulaire de contact
// Valide et crée un nouveau contact.
// Envoie un email contenant les informations de contact.
// En cas de succès, redirige l'utilisateur avec un message de confirmation.
// En cas d'erreur, redirige l'utilisateur avec un message d'erreur.