<?php
// app/Models/Trip.php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Trip extends Model
{
    protected $fillable = ['title', 'flight_id', 'accommodation_id', 'directions_id', 'image_url'];

    public function flight()
    {
        return $this->belongsTo(Flight::class);
    }

    public function accommodation()
    {
        return $this->belongsTo(Accommodation::class);
    }

    public function directions()
    {
        return $this->belongsTo(Directions::class);
    }
}
