<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GameMatch extends Model
{
        use HasFactory;
        
        protected $table = 'matches';

        public function category()
    {
        return $this->belongsTo(Category::class);
    }
    
    

    public function reservations()
    {
        return $this->hasMany(Reservation::class);
    }

    public function venueDescription()
    {
        return $this->belongsTo(VenueDescription::class);
    }
}