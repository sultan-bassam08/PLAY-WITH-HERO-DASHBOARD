<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

// In Reservation.php
class Reservation extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'match_id',
        'reservation_status'
    ];

    

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Change this method name from Gamematch to match
    public function match()
    {
        return $this->belongsTo(GameMatch::class, 'match_id');
    }
}