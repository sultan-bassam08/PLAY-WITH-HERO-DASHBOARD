<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    protected $fillable = [
        'name'
    ];

    public function matches()
{
    return $this->hasMany(GameMatch::class);
}

public function venues()
{
    return $this->hasMany(VenueDescription::class);
}
}