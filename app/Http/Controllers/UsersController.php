<?php

namespace agora\Http\Controllers;

use agora\User;
use Auth;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    public function view(User $user)
    {
        return view('users/view',compact('user'));
    }


    public function edit(User $user)
    {
        if(Auth::check()) {
            if (Auth::user() == $user) {
                return view('users/edit', compact('user'));
            }
        }
        return redirect('/u/' . $user->id);
    }


    public function update(Request $request, User $user)
    {
        if(Auth::check()) {

            if (Auth::user() == $user) {
                $validatedData = $request->validate([
                    'name' => 'required|max:16',
                ]);
                $user->img = $request->img;
                $user->name = $request->name;
                $user->description = $request->description;
                $user->save();
            }
        }
        return redirect('/u/' . $user->id);
    }
}
