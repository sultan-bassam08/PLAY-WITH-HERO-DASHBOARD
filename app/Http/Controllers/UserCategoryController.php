<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class UserCategoryController extends Controller
{
    public function index()
    {
        // Fetch all categories
        $categories = Category::all();
        return view('user.categories.index', compact('categories'));
    }

    public function show($id)
{
    $category = Category::with(['venues.venueInfo', 'venues.matches'])
                       ->findOrFail($id);
    return view('user.categories.index', compact('category'));
}

public function store(Request $request)
{
    $request->validate([
        'name' => 'required',
        'image' => 'required|image|max:2048' // Fixed typo: 'mux' -> 'max'
    ]);

    // Store the image in the 'public' disk
    $imagePath = $request->file('image')->store('categories', 'public');

    // Save the relative path (without 'storage/')
    Category::create([
        'name' => $request->name,
        'image_path' => $imagePath // Remove 'storage/' from the stored path
    ]);

    return redirect()->back();
}
}