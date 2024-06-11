<?php

namespace App\Http\Controllers;

use App\Models\Profile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function edit()
    {
        $profile = Auth::user()->profile;
        return view('profile.edit', compact('profile'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'avatar' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'birthday' => 'date',
            'bio' => 'string|max:1000',
        ]);

        $profile = Auth::user()->profile;
        if ($request->hasFile('avatar')) {
            $avatarName = time().'.'.$request->avatar->extension();  
            $request->avatar->move(public_path('avatars'), $avatarName);
            $profile->avatar = $avatarName;
        }
        $profile->birthday = $request->input('birthday');
        $profile->bio = $request->input('bio');
        $profile->save();

        return redirect()->route('profile.edit')->with('success', 'Profile updated successfully');
    }

    public function show($userId)
    {
        $profile = Profile::where('user_id', $userId)->firstOrFail();
        return view('profile.show', compact('profile'));
    }
}
