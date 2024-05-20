<?php

namespace App\Imports;

use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class HoribaImportJson implements ToCollection,WithHeadingRow
{
    /**
    * @param Collection $collection
    */


    public function collection(Collection $collection)
    {
        $collection = $collection->filter(function ($value, $key) {
            return $value['pm25'] != 'NoData' &&
                    $value['date_time'] != 'Minimum' &&
                    $value['date_time'] != 'MinDate' &&
                    $value['date_time'] != 'STD' &&
                    $value['date_time'] != 'Data[%]' &&
                    $value['date_time'] != 'Num' &&
                    $value['date_time'] != 'Avg' &&
                    $value['date_time'] != 'MaxDate' &&
                    $value['date_time'] != 'Maximum';
        });
        $lastRow = $collection->last();
        return [
            'PM2.5' => $lastRow['pm25'],
            'PM10' => $lastRow['pm10'],
            'CO' => $lastRow['co'],
            'timestamp' => strtotime($lastRow['date_time']),
            'datetime' => $lastRow['date_time'],
        ];

    }

    public function headingRow(): int
    {
        return 3;
    }
}
