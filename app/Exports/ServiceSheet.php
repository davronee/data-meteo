<?php

namespace App\Exports;

use App\Models\UzHydromet;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithColumnFormatting;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Concerns\WithPreCalculateFormulas;
use Maatwebsite\Excel\Concerns\WithStyles;
use Maatwebsite\Excel\Concerns\WithTitle;
use Maatwebsite\Excel\Events\AfterSheet;
use PhpOffice\PhpSpreadsheet\Style\NumberFormat;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class ServiceSheet implements FromView, ShouldAutoSize, WithStyles, WithEvents, WithPreCalculateFormulas, WithColumnFormatting,WithTitle
{
    public function collection()
    {
        return UzHydromet::all();
    }

    public function view(): View
    {
        return view('pages.exel.service_sheet');
    }

    public function styles(Worksheet $sheet)
    {
        $sheet->setCellValue("B10", "=ROUND(AVERAGE(B4:B9),0)");
        $sheet->setCellValue("C10", "=ROUND(AVERAGE(C4:C9),0)");
        $sheet->setCellValue("D10", "=ROUND(AVERAGE(D4:D9),0)");

//
        return [
            // Style the first row as bold text.
            1 => ['font' => ['bold' => true]],
            13 => ['font' => ['italic' => true]],
            14 => ['font' => ['italic' => true]],
            15 => ['font' => ['italic' => true]],
        ];

    }

    public function registerEvents(): array
    {
        // TODO: Implement registerEvents() method.

        return [
            AfterSheet::class => function (AfterSheet $event) {

                $event->sheet->getDelegate()->getParent()->getDefaultStyle()->getFont()->setName('Arial');

                $event->sheet->getDelegate()->getRowDimension('1')->setRowHeight(40);
                $event->sheet->getDelegate()->getStyle('A1:E1')
                    ->getAlignment()
                    ->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
                $event->sheet->getDelegate()->getStyle('A3:E3')
                    ->getAlignment()
                    ->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);

                $event->sheet->getDelegate()->getStyle('B:E')
                    ->getAlignment()
                    ->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);

                $event->sheet->getDelegate()->getStyle('A10')
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

                $event->sheet->getDelegate()->getStyle('E4')
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
        return 'Сервисы';

        // TODO: Implement title() method.
    }
}
