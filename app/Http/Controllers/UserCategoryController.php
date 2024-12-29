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
        // Find the specific category by ID and load related data if applicable
        $category = Category::findOrFail($id);
        return view('user.categories.index', compact('category'));
    }
}