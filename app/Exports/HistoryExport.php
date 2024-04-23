<?php

namespace App\Exports;

use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithTitle;

class HistoryExport implements ShouldAutoSize,FromView,WithTitle
{
    /**
     * @return \Illuminate\Support\Collection
     */

    protected $stationName;
    protected $stationId;


    public function __construct(string $stationName, string $stationId)
    {
        $this->stationName = $stationName;
        $this->stationId = $stationId;
    }


    public function view(): View
    {

        return view('pages.history', [
            'stationName' => $this->stationName,
            'stationId' => $this->stationId,
        ]);
    }


    public function title(): string
    {
        return $this->stationName;
    }
}
