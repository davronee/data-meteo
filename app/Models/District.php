<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class District extends Model
{
    use HasFactory;

    protected $table = "uz_districts";

    public function scopeByRegion($query, $user)
    {
        if(!is_null($user->region_id))
            $query->where('region_id', $user->region_id);

        if(!is_null($user->district_id))
            $query->where('district_id', $user->district_id);

        return $query;
    }

    public function scopeFilteredList($query)
    {
        return $query->whereNotIn('areacode', [260, 200, 400]);
    }
}
