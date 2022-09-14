<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Station extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'region_id', 'district_id'];

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
    public function variable()
    {
        return $this->hasMany(Variable::class, 'variableId');
    }

    public function getFormattedRegionAttribute()
    {
        return $this->region->nameUz;
    }

    public function getFormattedDistrictAttribute()
    {
        return $this->district->nameUz;
    }

    public function scopeByRegion($query, $user)
    {
        if(!is_null($user->region_id))
            $query->where('region_id', $user->region_id);

        if(!is_null($user->district_id))
            $query->where('district_id', $user->district_id);

        return $query;
    }

    public function scopeByStation($query, $user)
    {
        if(!is_null($user->station_id))
            $query->where('id', $user->station_id);

        return $query;
    }

    public function scopeWhereUniqueCheck($query, $data)
    {
        $query->where('region_id', $data['region_id'])
            ->where('district_id', $data['district_id'])
            ->where('name', $data['name']);

        return $query;
    }
}
