<?php

namespace App\Services\DailyStationInfo;

use App\Models\DailyStationInfo;

class CreateService
{
    public function store($data = [])
    {
        return DailyStationInfo::create($data);
    }
}
