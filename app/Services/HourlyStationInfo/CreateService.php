<?php

namespace App\Services\HourlyStationInfo;

use App\Models\HourlyStationInfo;

class CreateService
{
    public function store($data = [])
    {
        return HourlyStationInfo::create($data);
    }
}
