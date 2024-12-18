<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VenueDescription extends Model
{
    use HasFactory;

    public function venueInfo()
{
    return $this->belongsTo(VenueInfo::class);
}

public function category()
{
    return $this->belongsTo(Category::class);
}
}