<?php

namespace App\Http\Controllers;

use Image;
use App\Models\User;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    // View a user's profile
    public function index(User $user)
    {
        $photos = $user->photos()->orderBy('created_at', 'desc')->paginate(20);

        return view('profile.index', ['user' => $user, 'photos' => $photos]);
    }

    // Show the edit form
    public function edit()
    {
        return view('profile.edit', ['user' => auth()->user()]);
    }

    public function update(Request $request)
    {
        $data = $request->validate([
            'name' => ['required', 'min:3'],
            'avatar' => 'image',
            'bio' => 'max:255',
        ]);

        $user = auth()->user();

        if ($request->hasFile('avatar')) {
            $img = $request->file('avatar')->store('profile', 'public');
            Image::make(public_path("/storage/$img"))->fit(200, 200)->save();

            $data['avatar'] = $img;
        } else {
            $data['avatar'] = $user->profile->avatar;
        }

        // Update user
        $user->update([
            'name' => $data['name'],
        ]);

        // Update profile
        $user->profile()->update([
            'avatar' => $data['avatar'],
            'bio' => $data['bio'],
        ]);

        return redirect('/profile/' . $user->id);
    }
}
