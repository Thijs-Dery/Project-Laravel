<?php

namespace App\Http\Controllers;

use App\Models\Profile;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    public function edit()
    {
        $user = Auth::user();
        $profile = $user->profile;

        return view('profile.edit', ['user' => $user, 'profile' => $profile]);
    }

    public function update(Request $request)
    {
        $user = Auth::user();
        $profile = $user->profile ?? new Profile(['user_id' => $user->id]);
    
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . $user->id,
            'birthday' => 'required|date',
            'bio' => 'nullable|string',
            'avatar' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'password' => 'nullable|string|min:8|confirmed',
        ]);
    
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->save();
    
        $profile->birthday = $request->input('birthday');
        $profile->bio = $request->input('bio');
    
        if ($request->hasFile('avatar')) {
            $imageName = time().'.'.$request->avatar->getClientOriginalExtension();
            $request->avatar->move(public_path('avatars'), $imageName);
            $profile->avatar = $imageName;
        }
    
        $profile->save();
    
        if ($request->filled('password')) {
            $user->password = Hash::make($request->input('password'));
            $user->save();
        }
    
        return redirect()->route('profile.edit')->with('success', 'Profile updated successfully.');
    }


    public function show(User $user)
    {
        $profile = $user->profile;

        return view('profile.show', ['user' => $user, 'profile' => $profile]);
    }
}


