<?php

namespace App\Http\Controllers;

use App\Models\GameMatch;
use App\Models\Reservation;
use App\Models\User;
use Illuminate\Http\Request;

use function PHPUnit\Framework\matches;

class ReservationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        // $users = User::all();
        // $matches = GameMatch::all();
        $reservations = Reservation::all();
        return view('admin.reservations.index', compact("reservations"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $users = User::all();
        // dd($users);
        $matches = GameMatch::all();
        return view('admin.reservations.create', compact('users', 'matches'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Reservation $reservation)
    {
        $users = User::all();
        $matches = GameMatch::all();
        return view('admin.reservations.edit', compact('reservation', 'users', 'matches'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
