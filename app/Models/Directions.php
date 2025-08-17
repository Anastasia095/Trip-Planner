<?php
// app/Models/Directions.php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Directions extends Model
{
    protected $fillable = [
        'trip_id',
        'origin',
        'destination',
        'distance',
        'vehicle_mpg',
        'travel_time'
    ];

    public function trip()
    {
        return $this->belongsTo(Trip::class);
    }
}
