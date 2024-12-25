<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\venue_description;

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
        return $this->belongsTo(venue_description::class);
    }

}