<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Reservation;
use App\Models\GameMatch;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        return view('theme.dashboard', [
            'totalUsers' => User::count(),
            'totalReservations' => Reservation::count(),
            'totalMatches' => GameMatch::count(),
        ]);
    }
}