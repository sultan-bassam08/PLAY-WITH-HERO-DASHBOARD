<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Role;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $users = User::with('role')->get(); // Get all users with their roles
        return view('admin.users.index', compact('users'));
    }

    public function create()
    {
        $roles = Role::all(); // Get all roles for user assignment
        return view('admin.users.create', compact('roles'));
    }

    public function store(Request $request, $pass = 'admin12345')
    {
        // Validate input fields from the request
        $validated = $request->validate([
            'name' => 'required|string|max:55',
            'email' => 'required|email|unique:users',
            'role_id' => 'required|exists:roles,id',
        ]);

        // Validate the password parameter
        if (!is_string($pass) || strlen($pass) < 8) {
            return redirect()->back()->withErrors(['password' => 'The password parameter must be at least 8 characters long.']);
        }

        // Create the user
        $user = User::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'password' => bcrypt($pass), // Use the provided parameter
            'role_id' => $validated['role_id'],
        ]);

        return redirect()->route('users.index')->with('success', 'User created successfully!');
    }


    public function edit(User $user)
    {
        $roles = Role::all();
        return view('admin.users.edit', compact('user', 'roles'));
    }

    public function update(Request $request, User $user)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $user->id,
            'role_id' => 'required|exists:roles,id',
        ]);

        $user->update([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'role_id' => $validated['role_id'],
        ]);

        return redirect()->route('users.index')->with('success', 'User updated successfully!');
    }

    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->route('users.index')->with('success', 'User deleted successfully!');
    }
}
