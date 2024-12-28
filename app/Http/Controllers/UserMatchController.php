<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\GameMatch;

class UserMatchController extends Controller
{
    public function index($categoryId)
    {
        // Fetch the category
        $category = Category::with('matches')->findOrFail($categoryId);
         
        // Fetch matches for the category
        $matches = GameMatch::where('category_id', $categoryId)->get();
        

        return view('user.categories.index', compact('category', 'matches'));
    }
}