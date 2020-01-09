<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class RegistrationController extends Controller
{
    
    public function index()
    {
        return view('pages.signup');
    }

    public function store(Request $request)
    {
        // dd($request->all());
        // Validate
        $request->validate([
            'first_name' => 'required|max:100',
            'last_name' => 'required|max:100',
            'contact_no' => 'required|max:100',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|confirmed|min:5',
        ]);

        // Save data
        $user = User::create([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'email' => $request->email,
            'contact_no' => $request->contact_no,
            'password' => bcrypt($request->password)
        ]);

        // Sign the user in
        auth()->login($user);

        // Redirect
        return redirect('/contacts');
    }
}
