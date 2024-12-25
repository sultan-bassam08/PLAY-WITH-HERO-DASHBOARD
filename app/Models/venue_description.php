<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class venue_description extends Model
{
    use HasFactory;
    protected $table='venue_description';

    public function venueInfo()
{
    return $this->belongsTo(VenueInfo::class);
}

public function category()
{
    return $this->belongsTo(Category::class);
}
}