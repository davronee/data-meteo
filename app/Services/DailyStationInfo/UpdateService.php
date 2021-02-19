<?php

namespace App\Services\DailyStationInfo;

use App\Models\DailyStationInfo;

class UpdateService
{
    public function update($model, $data)
    {
        $model->fill($data);
        return $model->save();
    }
}
