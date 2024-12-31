<?php

namespace App\Http\Controllers;

use App\Models\VenueInfo;
use Illuminate\Http\Request;
use App\Models\VenueDescription;

class UserVenueController extends Controller
{
    public function index()
    {
        $venues = VenueInfo::with(['venueDescriptions.category', 'venueDescriptions.matches'])->get();
        return view('user.venues.index', compact('venues'));
    }

    public function show($id)
{
    // Get venue info with related data
    $venue = VenueInfo::with([
        'venueDescriptions.category',
        'venueDescriptions.matches' => function($query) {
            $query->orderBy('match_date_time', 'asc');
        }
    ])->findOrFail($id);

    return view('user.venues.show', compact('venue'));
}

    public function getVenueDetails($id)
    {
        $venueDescription = VenueDescription::with([
            'venueInfo',
            'category',
            'matches' => function($query) {
                $query->where('match_date_time', '>', now())
                    ->orderBy('match_date_time', 'asc');
            }
        ])->findOrFail($id);

        if (request()->ajax()) {
            return response()->json([
                'venue' => $venueDescription,
                'html' => view('user.venues._venue_details', compact('venueDescription'))->render()
            ]);
        }

        return redirect()->route('venues.show', $venueDescription->venue_info_id);
    }

    public function showCategory($categoryId)
    {
        $venues = VenueDescription::with(['venueInfo', 'category', 'matches'])
            ->where('category_id', $categoryId)
            ->get();

        return view('user.venues.category', compact('venues'));
    }
}