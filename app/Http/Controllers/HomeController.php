<?php

namespace App\Http\Controllers;

use App\Models\VenueInfo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function index()
    {
        // Fetch the 4 most reserved venues
        $mostReservedVenues = VenueInfo::select('venue_info.id', 'venue_info.name', 'venue_info.img_venue')
            ->join('venue_description', 'venue_info.id', '=', 'venue_description.venue_info_id')
            ->join('matches', 'venue_description.id', '=', 'matches.venue_description_id')
            ->join('reservations', 'matches.id', '=', 'reservations.match_id')
            ->groupBy('venue_info.id', 'venue_info.name', 'venue_info.img_venue')
            ->orderByDesc(DB::raw('count(reservations.id)'))
            ->limit(4)
            ->get();

            $footballCategory = \App\Models\Category::where('name', 'Football')->first();

        return view('user.home.index', compact('mostReservedVenues' , 'footballCategory'));
    }
}