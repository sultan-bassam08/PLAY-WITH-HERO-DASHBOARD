<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\VenueInfo;
use Illuminate\Http\Request;
use App\Models\VenueDescription;
use App\Http\Controllers\Controller;

class AdminVenueDescriptionController extends Controller
{
    public function index()
    {
        $descriptions = VenueDescription::with('venueInfo', 'category')->paginate(10);
        return view('admin.venue_descriptions.index', compact('descriptions'));
    }

    public function create()
    {
        $venues = VenueInfo::all(); // Fetch all venues
        $categories = Category::all(); // Fetch all categories (if needed)
        return view('admin.venue_descriptions.create', compact('venues', 'categories'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'venue_info_id' => 'required|exists:venue_info,id',
            'playground_description' => 'required|string',
            'max_spot' => 'required|integer',
            'category_id' => 'required|exists:categories,id',
        ]);

        VenueDescription::create($validatedData);

        return redirect()->route('admin.venue_descriptions.index')->with('success', 'Venue description created successfully.');
    }

    public function show($id)
    {
        $description = VenueDescription::with('venueInfo', 'category')->findOrFail($id);
        return view('admin.venue_descriptions.show', compact('description'));
    }

    public function edit($id)
    {
        $description = VenueDescription::findOrFail($id);
        $venues = VenueInfo::all(); // Fetch all venues
        $categories = Category::all(); // Fetch all categories (if needed)
        return view('admin.venue_descriptions.edit', compact('description', 'venues', 'categories'));
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'venue_info_id' => 'required|exists:venue_info,id',
            'playground_description' => 'required|string',
            'max_spot' => 'required|integer',
            'category_id' => 'required|exists:categories,id',
        ]);

        $description = VenueDescription::findOrFail($id);
        $description->update($validatedData);

        return redirect()->route('admin.venue_descriptions.index')->with('success', 'Venue description updated successfully.');
    }

    public function destroy($id)
    {
        $description = VenueDescription::findOrFail($id);
        $description->delete();

        return redirect()->route('admin.venue_descriptions.index')->with('success', 'Venue description deleted successfully.');
    }
}