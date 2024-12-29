<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VenueInfo extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'address', 'contact_number', 'email'];

    public function venueDescriptions()
    {
        return $this->hasMany(VenueDescription::class);
    }
}