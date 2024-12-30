<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VenueInfo extends Model
{
    use HasFactory;

    protected $table = 'venue_info';

    protected $fillable = ['name', 'address', 'contact_number', 'email' , 'img_venue'];

    public function venueDescriptions()
    {
        return $this->hasMany(VenueDescription::class);
    }
}