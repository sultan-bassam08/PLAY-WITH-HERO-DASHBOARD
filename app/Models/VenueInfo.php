<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VenueInfo extends Model
{
    use HasFactory;

    public function descriptions()
{
    return $this->hasMany(VenueDescription::class);
}
}