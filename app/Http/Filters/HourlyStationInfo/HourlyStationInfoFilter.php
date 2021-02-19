<?php

namespace App\Http\Filters\HourlyStationInfo;

use App\Http\Filters\Filter;
use Illuminate\Database\Eloquent\Builder;

class HourlyStationInfoFilter extends Filter
{
    /**
     * @param string $region_id
     */
    public function regionId(string $region_id)
    {
        $this->builder->where('region_id', $region_id);
    }
}
