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
        if($request->password || $request->password_confirmation){
            $request->validate([
                'first_name' => 'required|max:100',
                'last_name' => 'required|max:100',
                'contact_no' => 'required|max:100',
                'email' => 'required|email',
                'password' => 'required|confirmed|min:5',
            ]);
        }
        else{
            $request->validate([
                'first_name' => 'required|max:100',
                'last_name' => 'required|max:100',
                'contact_no' => 'required|max:100',
                'email' => 'required|email',
            ]);
        }
        

        $user = User::find($request->id);

        $user->first_name = $request->first_name;
        $user->last_name = $request->last_name;
        $user->email = $request->email;
        $user->contact_no = $request->contact_no;

        $user->save();

        return redirect('/profile')->with('msg', 'Profile updated successfully!');
    }
}
