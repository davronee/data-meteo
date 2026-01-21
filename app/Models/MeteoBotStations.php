<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MeteoBotStations extends Model
{
    use HasFactory;

    protected $table = 'meteo_bot_stations';

    protected $fillable = [
        'id',
        'stationid',
        'station_id',
        'sn',
        'name',
        'username',
        'password',
        'latitude',
        'longitude',
        'is_has_aq',
        'phone_number',
        'region_id',
        'district_id',
    ];
}
