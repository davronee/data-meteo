<?php

namespace App\Models;

use App\Http\Filters\Filterable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DailyStationInfo extends Model
{
    use HasFactory, Filterable;

    protected $dates = ['created_at', 'updated_at', 'published_at'];
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
        return $this->region->nameUz ?? trans('messages.republic');
    }

    public function getFormattedDistrictAttribute()
    {
        return $this->district->nameUz ?? trans('messages.republic');
    }

    public function getFormattedStationAttribute()
    {
        return $this->station->name ?? '';
    }

    public function getFormattedStaffAttribute()
    {
        return $this->user->fullname;
    }

    public function getFormattedPublishedAtAttribute()
    {
        return is_null($this->published_at) ? trans('messages.not_published') : $this->published_at->format('d.m.Y');
    }

    // scopes
    public function scopeWhereUser($query, $user)
    {
        if(!is_null($user->region_id))
            $query->where('region_id', $user->region_id);

        if(!is_null($user->district_id))
            $query->where('district_id', $user->district_id);

        if(!is_null($user->station_id))
            $query->where('station_id', $user->station_id);

        return $query;
    }


    // custom methods
    public function isSent()
    {
        return !is_null($this->published_at);
    }
}
