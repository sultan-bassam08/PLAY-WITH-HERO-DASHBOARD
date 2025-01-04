<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\GameMatch;
use App\Models\VenueInfo;
use Illuminate\Http\Request;
use App\Models\VenueDescription;
use App\Models\venue_description;
use Illuminate\Support\Facades\Log;

// use App\Models\venue_description;

class GameMatchController extends Controller
{
   

public function index()
{
    $matches = GameMatch::with(['category', 'venueDescription.venueInfo'])
        ->orderBy('match_date_time', 'desc')
        ->paginate(10);
    $venues = VenueInfo::all();
    return view('admin.matches.index', compact('matches', 'venues'));
}

public function create()
{
    $categories = Category::all();
    $venues = VenueInfo::all();
    return view('admin.matches.create', compact('categories', 'venues'));
}

public function store(Request $request)
{
    $validated = $request->validate([
        'venue_id' => 'required',
        'match_date' => 'required|date',
        'game_duration' => 'required',
        'status' => 'required|in:pending,available,booked,completed',
        'description' => 'nullable|string'
    ]);

    Log::info('Venue ID: ' . $request->venue_id);
    
    $venue_description = VenueDescription::where('venue_info_id', $request->venue_id)->first();
    
    if (!$venue_description) {
        Log::error('No venue description found for venue_id: ' . $request->venue_id);
        return redirect()->back()
            ->withInput()
            ->withErrors(['venue_id' => 'No venue description found for this venue.']);
    }

    $venue_description = VenueDescription::where('venue_info_id', $request->venue_id)->first();
    
    GameMatch::create([
        'venue_description_id' => $venue_description->id,
        'category_id' => $venue_description->category_id,
        'match_date_time' => $validated['match_date'],
        'game_duration' => $validated['game_duration'],
        'status' => $validated['status'],
        'description' => $validated['description']
    ]);

    return redirect()->route('admin.matches.index')->with('success', 'Match created');
}

public function edit(GameMatch $match)
{
    $categories = Category::all();
    $venues = VenueInfo::all();
    return view('admin.matches.edit', compact('match', 'categories', 'venues'));
}

public function update(Request $request, GameMatch $match)
{
    $validated = $request->validate([
        'venue_id' => 'required',
        'match_date' => 'required|date',
        'game_duration' => 'required',
        'status' => 'required|in:pending,available,booked,completed',
        'description' => 'nullable|string'
    ]);

    $venue_description = VenueDescription::where('venue_info_id', $request->venue_id)->first();
    
    $match->update([
        'venue_description_id' => $venue_description->id,
        'category_id' => $venue_description->category_id,
        'match_date_time' => $validated['match_date'],
        'game_duration' => $validated['game_duration'],
        'status' => $validated['status'],
        'description' => $validated['description']
    ]);

    return redirect()->route('admin.matches.index')->with('success', 'Match updated');
}

    public function destroy(GameMatch $match)
    {
        // Delete the match
        $match->delete();

        // Redirect to the matches index page with a success message
        return redirect()->route('admin.matches.index')->with('success', 'Match deleted successfully.');
    }

}