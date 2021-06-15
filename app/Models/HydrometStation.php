<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HydrometStation extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name', 'lattitude', 'longitude', 'region_id', 'is_active'];


    public function hydromet_sensor_data()
    {
        return $this->hasOne(HydrometSensorData::class,'station_id','id')->orderByDesc('created_at');
    }
}
