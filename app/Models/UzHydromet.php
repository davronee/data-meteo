<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UzHydromet extends Model
{
    use HasFactory;

    protected $dates = [
        'created_at',
        'updatet_at',
        'datetime',
    ];

    protected $fillable = [
      'service_id',
      'region',
      'datetime',
      'date',
      'air_t_min',
      'air_t_max',
      'wind_speed_min',
      'wind_speed_max',
      'wind_direction',
      'day_part',
      'precipitation',
      'temp_precent',
      'wind_precent',
      'rain_precent',
      'factik',
    ];
}
