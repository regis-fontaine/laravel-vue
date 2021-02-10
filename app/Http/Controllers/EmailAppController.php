<?php

namespace App\Http\Controllers;

use Inertia\Inertia;
use App\Models\Contact;
use App\Jobs\SendMailJob;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Mail\Contact as MailContact;
use Illuminate\Support\Facades\Mail;
use  Illuminate\Validation\Validator;
use Illuminate\Support\Facades\Redirect;

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

    public function switchStatus(int $id, int $status)
    {
        $contactToActivate = Contact::where('id', $id)->first();
        $contactToActivate->isActivate = $status;
        // dd($contactToActivate);
        $contactToActivate->save();
        return Redirect::route('emailApp')->with('success', 'Congrat\'s ! Status has been updated.');
    }

    // Delete
    public function deleteContact(int $id, Request $req)
    {
        $contactDel = Contact::where('id', $id)->first();
        $contactDel->delete();
        return Redirect::route('emailApp')->with('success', 'Congrat\'s ! Contact has been deleted.');
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
