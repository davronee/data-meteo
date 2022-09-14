<?php

namespace App\Imports;

use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithMultipleSheets;

class StationMultipleSheet implements WithMultipleSheets
{
    function __construct($year)
    {
        $this->year = $year;
    }

    public function sheets(): array
    {
        return [
            0 => new StationImport('Тамды', $this->year),
            1 => new StationImport('Тахиаташ', $this->year),
            2 => new StationImport('Термез', $this->year),
            3 => new StationImport('Каракалпакия', $this->year),
            4 => new StationImport('Ташкент', $this->year),
            5 => new StationImport('Фергана', $this->year),
        ];
    }
}
