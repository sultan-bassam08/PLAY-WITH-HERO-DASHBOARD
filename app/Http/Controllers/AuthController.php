<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function showLogin()
    {
        // Replace with the correct view path for login
        return view('user.auth.login');
    }

    public function showRegister()
    {
        // Replace with the correct view path for register
        return view('user.auth.register');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('auth.login'); // Use the route name
    }
}