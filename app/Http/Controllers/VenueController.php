<?php
namespace App\Http\Controllers;

use App\Models\VenueInfo;
use App\Models\VenueDescription;
use Illuminate\Http\Request;

class VenueController extends Controller
{
    public function index()
    {
        $venues = VenueInfo::with('descriptions')->get();
        return view('admin.venues.index', compact('venues'));
    }

    public function create()
    {
        return view('admin.venues.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email',
            'mobile' => 'required|string',
            'address' => 'required|string',
        ]);

        $venue = VenueInfo::create($validated);

        return redirect()->route('venues.index')->with('success', 'Venue added successfully!');
    }

    public function edit(VenueInfo $venue)
    {
        return view('admin.venues.edit', compact('venue'));
    }

    public function update(Request $request, VenueInfo $venue)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email',
            'mobile' => 'required|string',
            'address' => 'required|string',
        ]);

        $venue->update($validated);

        return redirect()->route('venues.index')->with('success', 'Venue updated successfully!');
    }

    public function destroy(VenueInfo $venue)
    {
        $venue->delete();
        return redirect()->route('venues.index')->with('success', 'Venue deleted successfully!');
    }
}