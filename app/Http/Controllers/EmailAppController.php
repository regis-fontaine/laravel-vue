<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Inertia\Inertia;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use  Illuminate\Validation\Validator;

class EmailAppController extends Controller
{

    // Create
    public function createNewContact(Request $req)
    {
        // Contact::create($req->all());
        $contact =
            $req->validate([
                'receiver' => ['required', 'max:120'],
                'email' => ['required', 'max:120', 'email'],
                'interval' => ['required'],
            ]);
        Contact::create($contact);

        return Redirect::route('emailApp')->with('success', 'Congrat\'s ! Contact has been created.');
        // dd($contact);
    }
    // Read
    public function index()
    {
        $contacts = Contact::all();

        return Inertia::render('EmailApp', [
            'contacts' => $contacts
        ]);
    }

    // Update

    public function updateContact(Request $req)
    {

        $contact = Contact::where('id', $req->id)->first();
        $this->authorize('update', $contact);
        $contact->update($req->all());

        return Redirect::route('emailApp')->with('success', 'Congrat\'s ! Contact has been modified.');
    }


    // Delete
    public function DeleteContact(int $id, Request $req)
    {
        return $req->input('id');
    }

    // Page Controller  
    public function pageCreateContact()
    {
        return Inertia::render('EmailApp/CreateContact', []);
    }

    public function editContact(int $id)
    {
        $contact = Contact::where('id', $id)->first();
        return Inertia::render('EmailApp/EditContact', [
            'contact' => $contact
        ]);
    }
}
