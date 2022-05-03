<?php

namespace App\Http\Controllers;

use App\Models\User;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Http\Request;

class GoogleAuthController extends Controller
{
    // Redirect to google auth
    public function redirect()
    {
        return Socialite::driver('google')->redirect();
    }

    // Callback
    public function callback()
    {
        $googleUser = Socialite::driver('google')->user();

        $user = User::updateOrCreate([
            'google_id' => $googleUser->id,
        ], [
            'name' => $googleUser->name,
            'email' => $googleUser->email,
        ]);

        $user->profile()->update(['social_avatar' => $googleUser->avatar]);

        auth()->login($user);

        return redirect('/');
    }
}
