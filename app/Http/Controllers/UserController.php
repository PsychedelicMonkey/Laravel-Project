<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    // Show the login form
    public function login()
    {
        return view('user.login');
    }

    // Authenticate the user
    public function authenticate(Request $request)
    {
        $data = $request->validate([
            'email' => ['required', 'email'],
            'password' => 'required',
        ]);

        if (auth()->attempt($data)) {
            $request->session()->regenerate();

            return redirect('/');
        }

        return back()->withErrors(['email' => 'Incorrect credentials'])->onlyInput('email');
    }

    // Show the register form
    public function register()
    {
        return view('user.register');
    }

    // Register the user
    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => ['required', 'min:3'],
            'email' => ['required', 'email', 'unique:users'],
            'password' => ['required', 'confirmed', 'min:6'],
        ]);

        // Hash password
        $data['password'] = bcrypt($data['password']);

        // Create the user
        $user = User::create($data);

        // Login the user after creation
        auth()->login($user);

        return redirect('/');
    }

    // Logout the user
    public function logout(Request $request)
    {
        auth()->logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/');
    }
}
