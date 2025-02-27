<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GameMatch extends Model
{
    use HasFactory;

    protected $table = 'matches';

    protected $fillable = [
        'venue_description_id',
        'description',
        'game_duration',
        'status',
        'match_date_time',
        'category_id'
    ];

    protected $dates = [
        'match_date_time'
    ];

    // Or alternatively, use $casts
    protected $casts = [
        'match_date_time' => 'datetime'
    ];
    public function isFull()
    {
        $currentSpots = $this->reservations()
            ->where('reservation_status', '!=', 'declined')
            ->count();
            
        return $currentSpots >= $this->venueDescription->max_spot;
    }

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }

        // In GameMatch.php
    public function reservations()
    {
        return $this->hasMany(Reservation::class, 'match_id');
    }

    public function venueDescription()
    {
        return $this->belongsTo(VenueDescription::class);
    }
}