<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\ContactRequest;
use App\Http\Requests\StoreContactRequest;
use App\Http\Requests\UpdateContactRequest;

class ContactController extends Controller
{
    public function index()
    {
        $contacts = Contact::orderBy('is_read')->simplePaginate(4);
        return view('dashboard.contact.index', compact('contacts'));
    }

    public function create(ContactRequest $request)
    {
        // dd($request->all());
        $data = $request->validated();
        Contact::create($data);
        return redirect()->back()->with('contactMessage', 'Your message has been sent successfully');
    }

    public function show(Contact $contact)
    {
        return view('dashboard.contact.single', compact('contact'));
    }



    public function markAsRead(Contact $contact)
    {
        $contact->is_read = true;
        $contact->save();
        return redirect()->route('contacts.index')->with('message', 'Contact marked as read');
    }




    public function destroy(Contact $contact)
    {
        // dd($contact);
        $contact->delete();
        return redirect()->route('contacts.index')->with('message', 'Contact deleted successfully');
    }
}
