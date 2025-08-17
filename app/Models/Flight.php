<?php
// app/Models/Flight.php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Flight extends Model
{
    protected $fillable = [
        'trip_id',
        'departure',
        'arrival',
        'airline',
        'flight_number',
        'departure_time',
        'arrival_time',
        'itinerary_pdf'
    ];

    public function trip()
    {
        return $this->belongsTo(Trip::class);
    }
}
