<?php

namespace App\Services\HourlyStationInfo;

use App\Models\HourlyStationInfo;

class UpdateService
{
    public function update($model, $data)
    {
        $model->fill($data);
        return $model->save();
    }
}
