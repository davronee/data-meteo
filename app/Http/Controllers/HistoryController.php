<?php

namespace App\Http\Controllers;

use App\Classes\HistoryServices;
use App\Exports\ExportByInterval;
use App\Exports\HistoryExportWithMultipleSheet;
use Maatwebsite\Excel\Facades\Excel;

class HistoryController extends Controller
{
    public function index()
    {
        return Excel::download(new HistoryExportWithMultipleSheet(), 'history.xlsx');
    }

    public function ByStationAndInterval()
    {

        return Excel::download(new ExportByInterval(), 'history_by_interval.xlsx');

    }

    public function Variablees()
    {
        $history = new HistoryServices();

        return $history->GetAllVariables();
    }
}
