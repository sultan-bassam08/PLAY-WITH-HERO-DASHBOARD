<?php
namespace App\Http\Controllers;

use App\Models\VenueDescription;
use Illuminate\Http\Request;

class VenueDescriptionController extends Controller
{
    public function index()
    {
        $venueDescriptions = VenueDescription::with('venueInfo', 'category')->get();
        return view('venue_descriptions.index', compact('venueDescriptions'));
    }

    public function show($id)
    {
        $venueDescription = VenueDescription::with('venueInfo', 'category')->findOrFail($id);
        return view('venue_descriptions.show', compact('venueDescription'));
    }
}