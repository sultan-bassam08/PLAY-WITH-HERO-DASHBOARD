<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;

class LoginController extends Controller
{
    // Show the login form
    public function showLoginForm()
    {
        return view('auth.login'); // Create a login blade
    }

    // Handle login attempt
    public function login(Request $request)
    {
        dd("test");
        // Validate input
        $request->validate([
            'username' => 'required|string',
            'password' => 'required|string',
        ]);

        // Attempt login
        if (Auth::attempt($request->only('username', 'password'), $request->has('remember'))) {
            return redirect()->route('home'); // Change to your desired route
        }

        return back()->withErrors([
            'username' => 'Invalid credentials.',
        ]);
    }
}