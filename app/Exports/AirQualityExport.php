<?php

namespace App\Exports;

use App\Classes\Services;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromView;

class AirQualityExport implements FromView
{

    public function view(): View
    {
        $service = new Services();
        $service->GetHoribaAvarage();
        $service->GetMeteoBot();
        return view('pages.exel.airreport', [
            'horiba' => $service->horibaData,
            'meteobot' => $service->dataArray
        ]);
    }
}
