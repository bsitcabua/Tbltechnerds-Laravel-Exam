<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SessionController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
    
    public function index()
    {
        return view('pages.login');
    }

    public function store(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $data = request(['email', 'password']);

        if(! Auth::attempt($data)){
            return back()->withErrors([
                'message' => 'Invalid credentials'
            ])->withInput();
        }

        return redirect('/contacts');
    }

    public function logout()
    {
        // Destroy Auth
        auth()->logout();

        // Redirect
        return redirect('/login')->with('msg', 'You have been logged out successfully');
    }
}
