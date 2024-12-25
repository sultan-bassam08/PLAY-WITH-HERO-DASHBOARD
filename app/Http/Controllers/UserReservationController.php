<?php

namespace App\Http\Controllers;

use App\Models\Reservation;
use App\Models\GameMatch;
use Illuminate\Http\Request;

class UserReservationController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'match_id' => 'required|exists:matches,id',
            'reservation_date' => 'required|date|after:today',
        ]);

        // Create a reservation
        Reservation::create([
            'user_id' => auth()->id(),
            'gamematch_id' => $request->input('match_id'),
            'reservation_date' => $request->input('reservation_date'),
        ]);

        return redirect()->route('reservations.index')->with('success', 'Reservation made successfully!');
    }

    public function index()
    {
        // Show user's reservations
        $reservations = Reservation::where('user_id', auth()->id())->get();
        return view('reservations.index', compact('reservations'));
    }
}