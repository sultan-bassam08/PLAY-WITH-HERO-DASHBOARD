<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VenueDescription extends Model
{
    use HasFactory;

    protected $table = 'venue_description';

    protected $fillable = ['venue_info_id', 'playground_description', 'max_spot', 'category_id'];

    public function venueInfo()
    {
        return $this->belongsTo(VenueInfo::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function matches()
    {
        return $this->hasMany(GameMatch::class, 'venue_description_id');
    }
}