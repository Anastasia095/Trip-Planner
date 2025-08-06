<?php
// app/Models/Accommodation.php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Accommodation extends Model
{
    protected $fillable = [
        'hotel_name',
        'address',
        'check_in',
        'check_out',
    ];

    protected $casts = [
        'check_in' => 'date',
        'check_out' => 'date',
    ];

    public function trip()
    {
        return $this->hasOne(Trip::class);
    }
}
