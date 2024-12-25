<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class UserCategoryController extends Controller
{
    public function index()
    {
        // Display categories for users
        $categories = Category::with('venues')->get();
        return view('categories.index', compact('categories'));
    }

    public function show($id)
    {
        // Display venues in a specific category
        $category = Category::with('venues')->findOrFail($id);
        return view('categories.show', compact('category'));
    }
    public function somePage()
{
    $categories = \App\Models\Category::all(); // Fetch all categories
    return view('user.some_page', compact('categories'));
}

}