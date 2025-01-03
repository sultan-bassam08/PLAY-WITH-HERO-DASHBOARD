<?php

namespace App\Http\Controllers;

use App\Models\GameMatch;
use App\Models\Reservation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;

class UserReservationController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function create(GameMatch $match)
    {
        // Check if user already has a reservation for this match
        $existingReservation = Reservation::where('user_id', Auth::id())
            ->where('match_id', $match->id)
            ->exists();

        if ($existingReservation) {
            // Return with SweetAlert message
            return redirect()->back()->with([
                'swal' => [
                    'type' => 'warning',
                    'title' => 'Reservation Already Exists',
                    'text' => 'You already have a reservation for this match.',
                ]
            ]);
        }

        // Check if user has another reservation at the same time
        $matchDateTime = $match->match_date_time;
        $existingTimeConflict = Reservation::whereHas('match', function ($query) use ($matchDateTime) {
            $query->whereDate('match_date_time', $matchDateTime->toDateString())
                ->whereTime('match_date_time', $matchDateTime->toTimeString());
        })
            ->where('user_id', Auth::id())
            ->exists();

        if ($existingTimeConflict) {
            // Return with SweetAlert message
            return redirect()->back()->with([
                'swal' => [
                    'type' => 'warning',
                    'title' => 'Time Conflict',
                    'text' => 'You already have a reservation at this date and time.',
                ]
            ]);
        }

        $venue = $match->venueDescription->venueInfo;
        $venueDescription = $match->venueDescription;
        $currentSpots = $match->reservations()->count();

        return view('user.reservations.create', compact('match', 'venue', 'venueDescription', 'currentSpots'));
    }

    public function store(Request $request)
    {
    
        $request->validate([
            'match_id' => 'required|exists:matches,id',
            'terms' => 'required|accepted'
        ]);

        $match = GameMatch::findOrFail($request->match_id);

        // Check if user already has a reservation for this match
        $existingReservation = Reservation::where('user_id', Auth::id())
            ->where('match_id', $match->id)
            ->exists();

        if ($existingReservation) {
            return back()->with([
                'swal' => [
                    'type' => 'warning',
                    'title' => 'Reservation Already Exists',
                    'text' => 'You already have a reservation for this match.',
                ]
            ]);
        }

        // Check if user has another reservation at the same time
        $matchDateTime = $match->match_date_time;
        $existingTimeConflict = Reservation::whereHas('match', function ($query) use ($matchDateTime) {
            $query->whereDate('match_date_time', $matchDateTime->toDateString())
                ->whereTime('match_date_time', $matchDateTime->toTimeString());
        })
            ->where('user_id', Auth::id())
            ->exists();

        if ($existingTimeConflict) {
            return back()->with([
                'swal' => [
                    'type' => 'warning',
                    'title' => 'Time Conflict',
                    'text' => 'You already have a reservation at this date and time.',
                ]
            ]);
        }

        $currentSpots = $match->reservations()->count();
        $maxSpots = $match->venueDescription->max_spot;

        if ($currentSpots >= $maxSpots) {
            return back()->with([
                'swal' => [
                    'type' => 'error',
                    'title' => 'Match Full',
                    'text' => 'Sorry, this match is already full.',
                ]
            ]);
        }

        try {
            $reservation = Reservation::create([
                'user_id' => Auth::id(),
                'match_id' => $request->match_id,
                'reservation_status' => 'waiting'
            ]);
        
            return redirect()->route('booking.confirmation', $reservation)->with([
                'swal' => [
                    'type' => 'success',
                    'title' => 'Booking Successful',
                    'text' => 'Your booking was successful! Please wait for confirmation.',
                ]
            ]);
        
        } catch (\Exception $e) {
            return back()->with([
                'swal' => [
                    'type' => 'error',
                    'title' => 'Error',
                    'text' => 'An error occurred while making the reservation.',
                ]
            ]);
        }
    }
    public function cancel(Reservation $reservation)
{
    if ($reservation->user_id !== Auth::id()) {
        return back()->with('error', 'Unauthorized action.');
    }

    $reservation->update(['reservation_status' => 'declined']);

    return back()->with([
        'swal' => [
            'type' => 'success',
            'title' => 'Booking Cancelled',
            'text' => 'Your booking has been cancelled successfully.'
        ]
    ]);
}

    public function index()
    {
        $reservations = Reservation::with('match.venueDescription.venueInfo')
            ->where('user_id', Auth::id())
            ->latest()
            ->get();
            
        return view('user.reservations.index', compact('reservations'));
    }
    public function checkReservation(GameMatch $match)
    {
        $exists = Reservation::where('user_id', Auth::id())
            ->where('match_id', $match->id)
            ->exists();
            
        return response()->json(['exists' => $exists]);
    }

    public function showConfirmation(Reservation $reservation)
{
    if ($reservation->user_id !== Auth::id()) {
        return redirect()->route('user.reservations.index')->with([
            'swal' => [
                'type' => 'error',
                'title' => 'Unauthorized',
                'text' => 'You cannot access this reservation.',
            ]
        ]);
    }

    return view('user.reservations.booking-confirmation', compact('reservation'));
}

public function showBookings(Request $request)
{
    $status = $request->get('status', 'waiting');
    
    $bookings = Reservation::with('match.venueDescription.venueInfo')
        ->where('user_id', Auth::id())
        ->where('reservation_status', $status)
        ->latest()
        ->get();
        
    return view('user.bookings.index', compact('bookings', 'status'));
}


}