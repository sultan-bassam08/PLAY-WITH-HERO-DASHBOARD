<?php

namespace App\Http\Controllers;

use App\Models\GameMatch;
use App\Models\Reservation;
use App\Models\User;
use Illuminate\Http\Request;

class ReservationController extends Controller
{
    public function index()
    {
        $reservations = Reservation::with(['user', 'match.venueDescription.venueInfo'])
        ->latest()
        ->paginate(7); // Paginate with 10 items per page
    return view('admin.reservations.index', compact('reservations'));
    }

    public function create()
    {
        $users = User::all();
        $matches = GameMatch::with(['venueDescription.venueInfo', 'category'])
            ->where('status', '!=', 'completed')
            ->get();
        return view('admin.reservations.create', compact('users', 'matches'));
    }

    public function store(Request $request)
    {
        try {
            $validated = $request->validate([
                'user_id' => 'required|exists:users,id',
                'match_id' => 'required|exists:matches,id'
            ]);

            $match = GameMatch::findOrFail($validated['match_id']);
            
            // Check if match is full
            if ($match->isFull()) {
                return redirect()->back()->with([
                    'swal' => [
                        'type' => 'error',
                        'title' => 'Match Full',
                        'text' => 'Cannot create reservation. Match is already full.'
                    ]
                ]);
            }

            // Check if user already has a reservation for this match
            $existingReservation = Reservation::where('user_id', $validated['user_id'])
                ->where('match_id', $match->id)
                ->exists();

            if ($existingReservation) {
                return redirect()->back()->with([
                    'swal' => [
                        'type' => 'warning',
                        'title' => 'Duplicate Reservation',
                        'text' => 'User already has a reservation for this match.'
                    ]
                ]);
            }

            Reservation::create([
                'user_id' => $validated['user_id'],
                'match_id' => $validated['match_id'],
                'reservation_status' => 'confirmed' // Admin-created reservations are automatically confirmed
            ]);

            return redirect()->route('admin.reservations.index')->with([
                'swal' => [
                    'type' => 'success',
                    'title' => 'Success',
                    'text' => 'Reservation created successfully!'
                ]
            ]);

        } catch (\Exception $e) {
            return redirect()->back()->with([
                'swal' => [
                    'type' => 'error',
                    'title' => 'Error',
                    'text' => 'Error creating reservation: ' . $e->getMessage()
                ]
            ]);
        }
    }

    public function edit(Reservation $reservation)
    {
        $users = User::all();
        $matches = GameMatch::with(['venueDescription.venueInfo', 'category'])
            ->where('status', '!=', 'completed')
            ->get();

        return view('admin.reservations.edit', compact('reservation', 'users', 'matches'));
    }

    public function update(Request $request, Reservation $reservation)
    {
        try {
            $validated = $request->validate([
                'user_id' => 'required|exists:users,id',
                'match_id' => 'required|exists:matches,id',
                'reservation_status' => 'required|in:waiting,confirmed,declined,completed'
            ]);

            $match = GameMatch::findOrFail($validated['match_id']);
            
            // Check if match is full only if changing to a different match
            if ($validated['match_id'] != $reservation->match_id && $match->isFull()) {
                return redirect()->back()->with([
                    'swal' => [
                        'type' => 'error',
                        'title' => 'Match Full',
                        'text' => 'Cannot update reservation. Selected match is already full.'
                    ]
                ]);
            }

            $reservation->update($validated);

            return redirect()->route('admin.reservations.index')->with([
                'swal' => [
                    'type' => 'success',
                    'title' => 'Success',
                    'text' => 'Reservation updated successfully!'
                ]
            ]);

        } catch (\Exception $e) {
            return redirect()->back()->with([
                'swal' => [
                    'type' => 'error',
                    'title' => 'Error',
                    'text' => 'Error updating reservation: ' . $e->getMessage()
                ]
            ]);
        }
    }

    public function destroy(Reservation $reservation)
    {
        try {
            $reservation->delete();
            return redirect()->route('admin.reservations.index')->with([
                'swal' => [
                    'type' => 'success',
                    'title' => 'Success',
                    'text' => 'Reservation deleted successfully!'
                ]
            ]);
        } catch (\Exception $e) {
            return redirect()->route('admin.reservations.index')->with([
                'swal' => [
                    'type' => 'error',
                    'title' => 'Error',
                    'text' => 'Error deleting reservation: ' . $e->getMessage()
                ]
            ]);
        }
    }
}   