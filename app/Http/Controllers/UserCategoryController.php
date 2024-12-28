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
    
        // Pass categories to the index view
        return view('user.categories.index', compact('categories'));
    }
    
    public function show($id)
    {
        $category = Category::with('venues', 'matches')->findOrFail($id);
        $matches = $category->matches; // Adjust the relationship as needed.
        
        return view('user.categories.index', compact('Category', 'matches'));
    }
    
    
    public function somePage()
{
    $categories = \App\Models\Category::all(); // Fetch all categories
    return view('user.some_page', compact('categories'));
}

}