<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Contact;

class Contacts extends Controller
{
    
    public function index()
    {
        $query = (isset($_GET['query'])) ? strip_tags(trim($_GET['query'])) : null;
        
        $contacts = Contact::where('user_id', auth()->user()->id);

        if($query){
            $contacts = $contacts->where('first_name', 'LIKE', '%' . $query . '%')
                        ->orWhere('last_name', 'LIKE', '%' . $query . '%')
                        ->orWhere('contact_no', 'LIKE', '%' . $query . '%')
                        ->orWhere('email', 'LIKE', '%' . $query . '%');
        }

        $contacts = $contacts->get();

        return view('pages.contacts', ["contacts"=> $contacts]);
    }

    public function store(Request $request)
    {
        // dd($request->all());
        // Validate
        $request->validate([
            'first_name' => 'required|max:100',
            'last_name' => 'required|max:100',
            'contact_no' => 'required|max:100',
            'email' => 'required|email|unique:contacts,email',
        ]);

        // Save data
        $user = Contact::create([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'email' => $request->email,
            'contact_no' => $request->contact_no,
            'user_id'   => auth()->user()->id,
        ]);

        // Redirect
        return redirect('/contacts')->with('msg', 'New contact added successfully!');
    }

    public function destroy(Request $request)
    {
        $id = $request->id;
        $contact = Contact::find($id);
        if($contact){
            if($contact->delete()){
                return redirect('/contacts')->with('msg', 'Contact deleted successfully!');
            }
        }
    }

    public function edit($id)
    {
        $contact = Contact::find($id);
        return view('pages.edit-contact', ["contact"=> $contact]);
    }

    public function update(Request $request)
    {
        $contact = Contact::find($request->id);

        $contact->first_name = $request->first_name;
        $contact->last_name = $request->last_name;
        $contact->email = $request->email;
        $contact->contact_no = $request->contact_no;

        $contact->save();

        return redirect('/contacts')->with('msg', 'Contact updated successfully!');
    }
}
