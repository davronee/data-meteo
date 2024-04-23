<?php

namespace App\Http\Filters\DailyStationInfo;

use App\Http\Filters\Filter;
use Illuminate\Database\Eloquent\Builder;

class DailyStationInfoFilter extends Filter
{
    /**
     * @param string $region_id
     */
    public function regionId(string $region_id)
    {
        $this->builder->where('region_id', $region_id);
    }
}
