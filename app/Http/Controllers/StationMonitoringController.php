<?php

namespace App\Http\Controllers;

use App\Http\Requests\aws\StoreRequest;
use App\Models\AWS;
use App\Models\AwsStatus;
use App\Models\UGM;
use Carbon\Carbon;
use Illuminate\Http\Request;

class StationMonitoringController extends Controller
{
    public function __construct()
    {
        $this->middleware('AllowAwsStatusTracker', ['only' => ['create', 'store']]);
    }

    public function index()
    {
        $firstDayOfMonth = date('Y-m-01');
        $lastDayOfMonth = date('Y-m-t');

        $ugms = UGM::orderBy('id', 'asc')->with('aws')->get();
        $aws_statuses = AwsStatus::toBase()
            ->whereBetween('date', [$firstDayOfMonth, $lastDayOfMonth])
            ->select('date', 'aws_id', 'status')
            ->get()
            ->keyBy('aws_id')
            ->toArray();

        $firstDayOfMonth = strtotime($firstDayOfMonth);
        $lastDayOfMonth = strtotime($lastDayOfMonth);
        $currentTime = $firstDayOfMonth;

        return view('aws.monitoring.show', compact('aws_statuses', 'firstDayOfMonth', 'lastDayOfMonth', 'currentTime', 'ugms'));
    }

    public function create()
    {
        $firstDayOfMonth = date('Y-m-01');
        $lastDayOfMonth = date('Y-m-t');

        $ugms = UGM::orderBy('id', 'asc')->with('aws')->get();
        $aws_statuses = AwsStatus::toBase()
            ->whereBetween('date', [$firstDayOfMonth, $lastDayOfMonth])
            ->select('date', 'aws_id', 'status')
            ->get()
            ->keyBy('aws_id')
            ->toArray();

        $firstDayOfMonth = strtotime($firstDayOfMonth);
        $lastDayOfMonth = strtotime($lastDayOfMonth);
        $currentTime = $firstDayOfMonth;

        return view('aws.monitoring.create', compact('aws_statuses', 'firstDayOfMonth', 'lastDayOfMonth', 'currentTime', 'ugms'));
    }

    public function store(StoreRequest $request)
    {
        $data = $request->validated();
        $aws_status = AwsStatus::firstOrCreate(
            [
                'date' => Carbon::parse($data['date'])->format('Y-m-d'),
                'aws_id' => $data['aws_id'],
            ],
            [
                'date' => Carbon::parse($data['date'])->format('Y-m-d'),
                'aws_id' => $data['aws_id'],
                'status' => $data['status']
            ]
        );

        return response()->json([
            'response_code' => 0,
            'response_text' => 'OK'
        ], 200);
    }
}
