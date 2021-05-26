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
            ->select('date', 'aws_id', 'status', 'is_published')
            ->get();

        $aws_status_new = [];
        foreach ($aws_statuses as $key => $data) {
            if(!isset($aws_status_new[$data->date])) $aws_status_new[$data->date] = [];
            $aws_status_new[$data->date][$data->aws_id] = $data;
        }
        $aws_statuses = $aws_status_new;

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
            ->select('date', 'aws_id', 'status', 'is_published')
            ->get();

        $aws_status_new = [];
        foreach ($aws_statuses as $key => $data) {
            if(!isset($aws_status_new[$data->date])) $aws_status_new[$data->date] = [];
            $aws_status_new[$data->date][$data->aws_id] = $data;
        }
        $aws_statuses = $aws_status_new;

        $firstDayOfMonth = strtotime($firstDayOfMonth);
        $lastDayOfMonth = strtotime($lastDayOfMonth);
        $currentTime = $firstDayOfMonth;


        return view('aws.monitoring.create', compact('aws_statuses', 'firstDayOfMonth', 'lastDayOfMonth', 'currentTime', 'ugms'));
    }

    public function store(StoreRequest $request)
    {
        $data = $request->validated();
        $aws_status = AwsStatus::where('date', Carbon::parse($data['date'])->format('Y-m-d'))->where('aws_id', $data['aws_id']);

        if($aws_status->count() == 0) {
            AwsStatus::create(
                [
                    'date' => Carbon::parse($data['date'])->format('Y-m-d'),
                    'aws_id' => $data['aws_id'],
                    'status' => $data['status'],
                    'is_published' => 0
                ]
            );
        } else {
            $aws_status->update(
                [
                    'date' => Carbon::parse($data['date'])->format('Y-m-d'),
                    'aws_id' => $data['aws_id'],
                    'status' => $data['status'],
                    'is_published' => 0
                ]
            );
        }

        return response()->json([
            'response_code' => 0,
            'response_text' => 'OK'
        ], 200);
    }

    public function save(Request $request)
    {
        AwsStatus::where('date', date('Y-m-d'))
            ->where('is_published', 0)
            ->update(['is_published' => 1]);

        return response()->json([
            'response_code' => 0,
            'response_text' => 'OK'
        ], 200);
    }
}
