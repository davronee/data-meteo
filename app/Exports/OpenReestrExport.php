<?php

namespace App\Exports;

use App\Models\OrdersService;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class OpenReestrExport implements FromView, ShouldAutoSize
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        //
    }

    public function view(): View
    {
        $offers = OrdersService::with('service')->get();

        return view('pages.exel.open_reestr_export', [
            'offers' => $offers
        ]);
    }
}
