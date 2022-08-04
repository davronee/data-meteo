<?php

namespace App\Exports;

use App\Classes\HistoryServices;
use Maatwebsite\Excel\Concerns\WithMultipleSheets;

class ExportByInterval implements WithMultipleSheets
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function sheets(): array
    {
        $stationds = [6, 20, 21, 51, 12, 1, 2, 3, 19];
        $arr = [];
        $history = new HistoryServices();
        foreach ($history->GetAllAwstations() as $item) {
            if ($item['Id'] == 6 ||
                $item['Id'] == 20 ||
                $item['Id'] == 21 ||
                $item['Id'] == 51 ||
                $item['Id'] == 12 ||
                $item['Id'] == 1 ||
                $item['Id'] == 2 ||
                $item['Id'] == 3 ||
                $item['Id'] == 19)
                array_push($arr, new HistoryExport($item['Name'], $item['Id']));
        }

        return $arr;
    }
}
