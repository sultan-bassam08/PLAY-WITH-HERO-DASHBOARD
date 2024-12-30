<?php
namespace App\Http\Controllers;

use App\Models\VenueInfo;
use Illuminate\Http\Request;

class VenueInfoController extends Controller
{
    public function index()
    {
        $venues = VenueInfo::all();
        return view('venues.index', compact('venues'));
    }

    public function show($id)
    {
        $venue = VenueInfo::with(['venueDescriptions.category', 'venueDescriptions.matches'])
                          ->findOrFail($id);
        return view('venues.show', compact('venue'));
    }
}