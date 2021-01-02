<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DailyStationInfo extends Model
{
    use HasFactory;

    protected $fillable = ['description', 'published_at', 'user_id', 'region_id', 'district_id', 'station_id'];

    public function region()
    {
        return $this->belongsTo('App\Models\Region', 'region_id', 'regionid');
    }

    public function district()
    {
        return $this->belongsTo('App\Models\District', 'district_id', 'areaid');
    }

    public function station()
    {
        return $this->belongsTo('App\Models\Station');
    }

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }

    public function getFormattedRegionAttribute()
    {
        return $this->region->nameUz;
    }

    public function getFormattedDistrictAttribute()
    {
        return $this->district->nameUz;
    }

    public function getFormattedStationAttribute()
    {
        return $this->station->name;
    }

    public function getFormattedStaffAttribute()
    {
        return $this->user->fullname;
    }

    public function getFormattedPublishedAtAttribute()
    {
        return is_null($this->published_at) ? trans('messages.not_published') : $this->published_at;
    }
}
