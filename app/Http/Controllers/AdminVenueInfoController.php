<?php

namespace App\Http\Controllers;

use App\Models\VenueInfo;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class AdminVenueInfoController extends Controller
{
    public function index()
    {
        $venues = VenueInfo::paginate(10);
       
        return view('admin.venues.index', compact('venues'));
    }

    public function create()
    {
        return view('admin.venues.create');
    }

    public function store(Request $request)
{
    // Debug the request data
  

    $validatedData = $request->validate([
        'name' => 'required|string|max:255',
        'address' => 'required|string|max:255',
        'mobile' => 'required|string|max:20',
        'email' => 'required|email|max:255',
        'img_venue' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
    ]);

    if ($request->hasFile('img_venue')) {
        $validatedData['img_venue'] = $request->file('img_venue')->store('img_venues', 'public');
    }

    VenueInfo::create($validatedData);

    return redirect()->route('admin.venues.index')->with('success', 'Venue created successfully.');
}

    public function show($id)
    {
        $venue = VenueInfo::findOrFail($id);
        return view('admin.venues.show', compact('venue'));
    }

    public function edit($id)
    {
        $venue = VenueInfo::findOrFail($id);
        return view('admin.venues.edit', compact('venue'));
    }

 
public function update(Request $request, $id)
{
    $validatedData = $request->validate([
        'name' => 'required|string|max:255',
        'address' => 'required|string|max:255',
        'mobile' => 'required|string|max:20',
        'email' => 'required|email|max:255',
        'img_venue' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Validate image file
    ]);

    $venue = VenueInfo::findOrFail($id);

    // Handle file upload
    if ($request->hasFile('img_venue')) {
        // Delete old image if it exists
        if ($venue->img_venue) {
            Storage::disk('public')->delete($venue->img_venue);
        }
        $validatedData['img_venue'] = $request->file('img_venue')->store('venues', 'public'); // Save new file to storage
    }

    $venue->update($validatedData);

    return redirect()->route('admin.venues.index')->with('success', 'Venue updated successfully.');
}

    public function destroy($id)
    {
        $venue = VenueInfo::findOrFail($id);
        $venue->delete();

        return redirect()->route('admin.venues.index')->with('success', 'Venue deleted successfully.');
    }
}