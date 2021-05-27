<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MicrostepStationsValues extends Model
{
    use HasFactory;

    public function station()
    {
        return $this->belongsTo(MicrostepStations::class, 'station_id');
    }
}
