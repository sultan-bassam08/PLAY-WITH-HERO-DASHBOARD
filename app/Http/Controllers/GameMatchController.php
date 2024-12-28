<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\GameMatch;
use App\Models\venue_description;
use App\Models\VenueDescription;
use App\Models\VenueInfo;

// use App\Models\venue_description;

class GameMatchController extends Controller
{
    public function index()
    {
        $matches = GameMatch::with(['category', 'venueDescription'])->get();
$venueIds = $matches->pluck('venueDescription.venue_info_id')->unique();
$venues = VenueInfo::whereIn('id', $venueIds)->get();


return view('admin.matches.index', compact('matches', 'venues'));

    }

    public function create()
    {
        $categories = Category::all();
        $venues= VenueInfo::all();
        // $venues = venue_description::all();
        return view('admin.matches.create', compact('categories','venues'));
    }

    public function store(Request $request)
{
    // Validate the request input
    $validated = $request->validate([
        'venue_id' => 'required',
        'match_date' => 'required|date',
        'game_duration' => 'required|integer',
        'status' => 'required|string',
    ]);

    // Fetch venue_description details
    $venue_description = VenueDescription::where('venue_info_id', '=', $request->input('venue_id'))
        ->first(['id', 'category_id']);

    // Ensure the venue_description is found
    if (!$venue_description) {
        return redirect()->back()->withErrors(['venue_id' => 'Venue description not found.']);
    }

    // Prepare data for GameMatch creation
    $gameMatchData = [
        'venue_description_id' => $venue_description->id,
        'category_id' => $venue_description->category_id,
        'match_date_time' => $validated['match_date'],
        'game_duration' => $validated['game_duration'],
        'status' => $validated['status'],
    ];

    // Create the GameMatch record
    GameMatch::create($gameMatchData);

    return redirect()->route('matches.index')->with('success', 'Match created successfully!');
}


    public function edit(GameMatch $match)
    {
        $categories = Category::all();
        // $venues = venue_description::all();
        return view('admin.matches.edit', compact('match', 'categories'));
    }

    public function update(Request $request, GameMatch $match)
    {
        $validated = $request->validate([
            'category_id' => 'required|exists:categories,id',
            // 'venue_description_id' => 'required|exists:venue_descriptions,id',
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