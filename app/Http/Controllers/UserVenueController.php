<?php

namespace App\Http\Controllers;

use App\Models\VenueInfo;
use Illuminate\Http\Request;

class UserVenueController extends Controller
{
    public function show($id)
    {
        // Display a specific venue
        $venue = VenueInfo::with('descriptions')->findOrFail($id);
        return view('venues.show', compact('venue'));
    }
}