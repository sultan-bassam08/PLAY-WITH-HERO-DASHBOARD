<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:' . User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'profile_picture' => ['nullable', 'image', 'mimes:jpg,jpeg,png', 'max:2048'], // Profile picture validation
        ]);
    
        // Handle profile picture upload
        $profilePicturePath = null;
        if ($request->hasFile('profile_picture')) {
            $profilePicturePath = $request->file('profile_picture')->store('profile_pictures', 'public');
        }
    
        // Create the user with a default role (user role = 2)
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'address' => $request->address ?? null,
            'phone' => $request->phone ?? null,
            'gender' => $request->gender ?? null,
            'date_of_birth' => $request->date_of_birth ?? null,
            'bio' => $request->bio ?? null,
            'profile_picture' => $profilePicturePath,
            'role_id' => 2, // Default to 'user' role
        ]);
    
        // Trigger registered event
        event(new Registered($user));
    
        // Log the user in
        Auth::login($user);
    
        // Redirect to dashboard
        return redirect()->route('dashboard'); // Replace with your dashboard route
    }
}