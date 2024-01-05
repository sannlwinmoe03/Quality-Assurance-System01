<?php

namespace App\Http\Controllers;

use App\Models\Idea;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use RealRashid\SweetAlert\Facades\Alert;

class UserController extends Controller
{
    /** User profile */
    public function profile(User $user)
    {
        /** anonymous ideas will be included in the user profile itself */
        $ideas = Idea::where('user_id', $user->id)->latest()->get();
        return view('users.show', compact('user', 'ideas'));
    }

    /** another user checks the user profile */
    public function show(Request $request)
    {
        $username = $request->query('username');
        $user = User::where('username', $username)->first();
        
        if(auth()->user()->username == $username)
        {
            $ideas = Idea::where('user_id', $user->id)->latest()->get();
        }
        else 
        {
            /** other user cannot see the anonymously posted ideas */
            $ideas = Idea::where('user_id', $user->id)->where('is_anonymous', false)->latest()->get();
        }


        return view('users.show', compact('user', 'ideas'));
    }

    public function edit(User $user)
    {
        return view('users.edit', compact('user'));
    }

    /** update the user password for the first time for security concerns */
    public function update(Request $request, User $user)
    {   
        $userData = $request->validate([
            'username' => ['required', Rule::unique('users')->ignore(auth()->id()), 'max:50'],
            'firstname' => ['required', 'max:50'],
            'lastname' => ['required', 'max:50'],
            'image' => [ 'nullable', 'image', 'mimes:jpg,png,jpeg', 'max:2048']
        ]);

        if($request->file('image') ?? false)
        {
            $image = $request->file('image');
            $filename = uniqid() . '.' . $image->getClientOriginalExtension();

            $image->storeAs('public/images', $filename);
            $userData['image'] = $filename;
        }

        $user->update($userData);

        Alert::toast('Profile updated successfully', 'success');
        return redirect()->route('user.profile', $user->username);
    }
}

