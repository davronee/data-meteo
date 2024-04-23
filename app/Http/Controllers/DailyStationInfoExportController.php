<?php

namespace App\Http\Controllers;

use PDF;
use Illuminate\Http\Request;
use App\Libraries\HTML_TO_DOC;
use App\Models\DailyStationInfo;

class DailyStationInfoExportController extends Controller
{
    public function __construct()
    {
        $this->middleware('role:central-agent-station');
    }

    public function doc(Request $request, DailyStationInfo $dailyStationInfo)
    {
        $htd = new HTML_TO_DOC();
        $content = $dailyStationInfo->description;
        $htd->createDoc($content, "daily-station-info", true);
    }

    public function pdf(Request $request, DailyStationInfo $dailyStationInfo)
    {
        $pdf = PDF::setOptions(['dpi' => 150, 'defaultFont' => 'Arial'])
            ->loadView('daily-station-info.pdf', compact('dailyStationInfo'));
        return $pdf->download('daily-station-info.pdf');
    }
}
