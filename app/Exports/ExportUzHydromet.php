<?php

namespace App\Exports;

use App\Models\UzHydromet;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithColumnFormatting;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Concerns\WithMultipleSheets;
use Maatwebsite\Excel\Concerns\WithPreCalculateFormulas;
use Maatwebsite\Excel\Concerns\WithStyles;
use Maatwebsite\Excel\Events\AfterSheet;
use PhpOffice\PhpSpreadsheet\Style\NumberFormat;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class ExportUzHydromet implements WithMultipleSheets
{
    /**
     * @return \Illuminate\Support\Collection
     */


    public function sheets(): array
    {
        return [
            0 => new HyrdometSheet(),
            1 => new ServiceSheet(),
        ];
        // TODO: Implement sheets() method.
    }
}
