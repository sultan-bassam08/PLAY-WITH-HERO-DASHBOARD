<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\GameMatch;
use App\Models\VenueDescription;

class GameMatchController extends Controller
{
    public function index()
    {
        $matches = GameMatch::with(['category', 'venueDescription'])->get();
        return view('admin.matches.index', compact('matches'));
    }

    public function create()
    {
        $categories = Category::all();
        $venues = VenueDescription::all();
        return view('admin.matches.create', compact('categories', 'venues'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'category_id' => 'required|exists:categories,id',
            'venue_description_id' => 'required|exists:venue_descriptions,id',
            'date_time' => 'required|date',
            'game_duration' => 'required|integer',
            'status' => 'required|string',
        ]);

        GameMatch::create($validated);

        return redirect()->route('matches.index')->with('success', 'Match created successfully!');
    }

    public function edit(GameMatch $match)
    {
        $categories = Category::all();
        $venues = VenueDescription::all();
        return view('admin.matches.edit', compact('match', 'categories', 'venues'));
    }

    public function update(Request $request, GameMatch $match)
    {
        $validated = $request->validate([
            'category_id' => 'required|exists:categories,id',
            'venue_description_id' => 'required|exists:venue_descriptions,id',
            'date_time' => 'required|date',
            'game_duration' => 'required|integer',
            'status' => 'required|string',
        ]);

        $match->update($validated);

        return redirect()->route('matches.index')->with('success', 'Match updated successfully!');
    }

    public function destroy(GameMatch $match)
    {
        $match->delete();
        return redirect()->route('matches.index')->with('success', 'Match deleted successfully!');
    }
}