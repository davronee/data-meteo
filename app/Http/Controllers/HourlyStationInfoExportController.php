<?php

namespace App\Http\Controllers;

use PDF;
use Illuminate\Http\Request;
use App\Libraries\HTML_TO_DOC;
use App\Models\HourlyStationInfo;

class HourlyStationInfoExportController extends Controller
{
    public function __construct()
    {
        // $this->middleware('HourlyStationWorkHour');
    }

    public function doc(Request $request, HourlyStationInfo $hourlyStationInfo)
    {
        $htd = new HTML_TO_DOC();
        $content = $hourlyStationInfo->description;
        $htd->createDoc($content, "hourly-station-info", true);
    }

    public function pdf(Request $request, HourlyStationInfo $hourlyStationInfo)
    {
        $pdf = PDF::setOptions(['dpi' => 150, 'defaultFont' => 'Arial'])
            ->loadView('hourly-station-info.pdf', compact('hourlyStationInfo'));
        return $pdf->download('hourly-station-info.pdf');
    }
}
