<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserProfileController extends Controller
{
    public function index()
    {
        $user = Auth::user(); // Get the authenticated user
        return view('user.profile.index', compact('user')); // Load the profile page
    }

    public function edit()
    {
        $user = Auth::user(); // Get the authenticated user
        return view('user.profile.edit', compact('user')); // Load the edit profile page
    }

    public function update(Request $request)
{
    $user = Auth::user();
    

    if (!$user) {
        return redirect()->route('user.profile.index')->withErrors('No authenticated user found.');
    }

    // Validate input data
    $data = $request->validate([
        'name' => 'required|string|max:255',
        'bio'  => 'nullable|string|max:500',
        'profile_picture' => 'nullable|image|max:2048',
    ]);

    // Handle the profile picture upload if provided
    if ($request->hasFile('profile_picture')) {
        $data['profile_picture'] = $request->file('profile_picture')->store('profile_pictures', 'public');
    }

    $user->update($data);

    return redirect()->route('user.profile.index')->with('success', 'Profile updated successfully!');
}

    
    
}