<?php

namespace App\Http\Controllers;

use App\Exports\HistoryExportWithMultipleSheet;
use Maatwebsite\Excel\Facades\Excel;

class HistoryController extends Controller
{
    public function index()
    {
       return  Excel::download(new HistoryExportWithMultipleSheet(), 'history.xlsx');
    }
}
