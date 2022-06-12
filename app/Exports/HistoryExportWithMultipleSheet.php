<?php

namespace App\Exports;

use App\Classes\HistoryServices;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\WithMultipleSheets;

class HistoryExportWithMultipleSheet implements WithMultipleSheets
{
    /**
     * @return \Illuminate\Support\Collection
     */
    use Exportable;


    public function sheets(): array
    {
        $arr = [];
        $history = new HistoryServices();
        foreach ($history->GetAllAwstations() as $item) {
            array_push($arr, new HistoryExport($item['Name'], $item['Id']));
        }

        return $arr;
    }
}
