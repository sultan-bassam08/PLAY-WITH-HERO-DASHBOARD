<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'name',
        'image_path'
    ];

    public function matches()
    {
        return $this->hasMany(GameMatch::class, 'category_id');
    }

public function venues()
{
    return $this->hasMany(VenueDescription::class);
}
}