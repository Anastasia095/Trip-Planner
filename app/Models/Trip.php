<?php
// app/Models/Trip.php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

use App\Models\Flight;
use App\Models\Accommodation;
use App\Models\Directions;


class Trip extends Model
{
    protected $fillable = ['title', 'image_url'];

    public function flight(): HasMany
    {
        return $this->hasMany(Flight::class);
    }

    public function accommodation(): HasMany
    {
        return $this->hasMany(Accommodation::class);
    }

    public function directions(): HasOne
    {
        return $this->hasOne(Directions::class);
    }
}
