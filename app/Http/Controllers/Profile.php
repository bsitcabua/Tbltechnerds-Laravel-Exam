<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class Profile extends Controller
{
    
    public function index()
    {
        $profile = User::find(auth()->user()->id);
        return view('pages.profile', ["profile"=> $profile]);
    }

    public function update(Request $request)
    {
        $user = User::find($request->id);

        $user->first_name = $request->first_name;
        $user->last_name = $request->last_name;
        $user->email = $request->email;
        $user->contact_no = $request->contact_no;

        $user->save();

        return redirect('/profile')->with('msg', 'Profile updated successfully!');
    }
}
