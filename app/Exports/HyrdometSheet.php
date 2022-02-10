<?php

namespace App\Exports;

use App\Models\UzHydromet;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithColumnFormatting;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Concerns\WithPreCalculateFormulas;
use Maatwebsite\Excel\Concerns\WithStyles;
use Maatwebsite\Excel\Concerns\WithTitle;
use Maatwebsite\Excel\Events\AfterSheet;
use PhpOffice\PhpSpreadsheet\Style\NumberFormat;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class HyrdometSheet  implements FromView, ShouldAutoSize, WithStyles, WithEvents, WithPreCalculateFormulas, WithColumnFormatting,WithTitle
{

    public function collection()
    {
        UzHydromet::all();
    }

    public function view(): View
    {
        return view('pages.exel.report');
    }

    public function styles(Worksheet $sheet)
    {
        $sheet->setCellValue("B18", "=ROUND(AVERAGE(B4:B17),0)");
        $sheet->setCellValue("C18", "=ROUND(AVERAGE(C4:C17),0)");
        $sheet->setCellValue("D18", "=ROUND(AVERAGE(D4:D17),0)");

//
        return [
            // Style the first row as bold text.
            1 => ['font' => ['bold' => true]],
            21 => ['font' => ['italic' => true]],
            22 => ['font' => ['italic' => true]],
            23 => ['font' => ['italic' => true]],
        ];

    }

    public function registerEvents(): array
    {
        // TODO: Implement registerEvents() method.

        return [
            AfterSheet::class => function (AfterSheet $event) {

                $event->sheet->getDelegate()->getParent()->getDefaultStyle()->getFont()->setName('Arial');

                $event->sheet->getDelegate()->getRowDimension('1')->setRowHeight(40);
                $event->sheet->getDelegate()->getStyle('A1:D1')
                    ->getAlignment()
                    ->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
                $event->sheet->getDelegate()->getStyle('A3:D3')
                    ->getAlignment()
                    ->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);

                $event->sheet->getDelegate()->getStyle('B:D')
                    ->getAlignment()
                    ->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);

                $event->sheet->getDelegate()->getStyle('A18')
                    ->getFill()
                    ->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)
                    ->getStartColor()
                    ->setARGB('6E0B4');

                $event->sheet->getDelegate()->getStyle('B4')
                    ->getFill()
                    ->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)
                    ->getStartColor()
                    ->setARGB('F4B084');

                $event->sheet->getDelegate()->getStyle('C4')
                    ->getFill()
                    ->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)
                    ->getStartColor()
                    ->setARGB('FFD966');

                $event->sheet->getDelegate()->getStyle('D4')
                    ->getFill()
                    ->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)
                    ->getStartColor()
                    ->setARGB('BDD7EE');


            },
        ];
    }

    public function columnFormats(): array
    {
        return [
            'B' => NumberFormat::FORMAT_NUMBER,
            'C' => NumberFormat::FORMAT_NUMBER,
            'D' => NumberFormat::FORMAT_NUMBER,
        ];
    }

    public function title(): string
    {
        return 'Узгидромет';
        // TODO: Implement title() method.
    }
}
