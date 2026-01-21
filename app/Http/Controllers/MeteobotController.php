<?php

namespace App\Http\Controllers;

use App\Models\MeteoBotStations;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class MeteobotController extends Controller
{
    public function GetStations()
    {
        $stations = MeteoBotStations::get();
        return response()->json($stations);
    }

    public function GetOnlyAirQualityStationsList()
    {
        $stations = MeteoBotStations::select(['id', 'stationid', 'name', 'latitude', 'longitude','region_id','district_id'])->where('is_has_aq', 1)->get();
        return response()->json($stations);
    }

    public function GetOnlyAirQualityStation($stationid)
    {
        try {
            $meteobot = MeteoBotStations::where('stationid', $stationid)->where('is_has_aq', 1)->first();
            if (!isset($meteobot->stationid))
                return response()->json('Not found', 404);
            $data = Http::withBasicAuth(
                $meteobot->username,
                $meteobot->password
            )->withOptions([
                'verify' => false
            ])->get('https://export.meteobot.com/v2/Generic/IndexFull',
                [
                    'id' => intval($meteobot->stationid),
                    'startTime' => Carbon::now()->format('Y-m-d') . ' 00:00',
                    'endTime' => Carbon::now()->format('Y-m-d') . ' ' . Carbon::now()->addDays(1)->addHour()->format('H') . ':00',
                ])->body();
            $acctArr = explode("\r", $data);
            $arr = [];
            if (count($acctArr) > 2) {
                foreach ($acctArr as $item) {
                    if ($item != "\n")
                        array_push($arr, str_getcsv($item, ';'));
                }
                return response()->json(
                    [
                        'id' => $meteobot->stationid,
                        'PM2.5' => $arr[count($arr) - 1][13],
                        'region_id' => $meteobot->region_id,
                        'district_id' => $meteobot->district_id,
                        'PM10' => $arr[count($arr) - 1][15],
                        'CO' => $arr[count($arr) - 1][17],
                        'timestamp' => Carbon::parse($arr[count($arr) - 1][1] . ' ' . $arr[count($arr) - 1][2])->setTimezone('UTC')->timestamp,
                        'datetime' => Carbon::parse($arr[count($arr) - 1][1] . ' ' . $arr[count($arr) - 1][2])->setTimezone('UTC')->format('Y-m-d H:i:s'),
                    ]);

            } else {
                return response()->json('No Data', 503);
            }
        } catch (\Exception $exception) {
            return response()->json($exception->getMessage());
        }
    }

    public function GetNotWorkingStations()
    {
        $stations = MeteoBotStations::get();
        $data = [];
        foreach ($stations as $station) {

            $response = Http::withBasicAuth(
                $station->username,
                $station->password
            )->withOptions([
                'verify' => false
            ])->get('https://export.meteobot.com/v2/Generic/Locate',
                [
                    'id' => intval($station->sn),
                ])->status();;
            if ($response != 200) {
                array_push($data, $station->sn);
            }
        }
        return response()->json($data);
    }

    public function GetStationLocation(Request $request)
    {
        try {
            $stationId = $request->query('stationId');

            if (!$stationId) {
                return response()->json([
                    'error' => 'stationId parameter is required'
                ], 400);
            }

            // Avval stationid bo'yicha qidirish
            $meteobot = MeteoBotStations::where('stationid', $stationId)->first();

            // Agar topilmasa, sn bo'yicha qidirish
            if (!$meteobot) {
                $meteobot = MeteoBotStations::where('sn', $stationId)->first();
            }

            if (!$meteobot) {
                return response()->json([
                    'error' => 'Station not found'
                ], 404);
            }

            if (!$meteobot->username || !$meteobot->password) {
                return response()->json([
                    'error' => 'Station credentials not found'
                ], 404);
            }

            // Meteobot API ga so'rov yuborish
            $response = Http::withBasicAuth(
                $meteobot->username,
                $meteobot->password
            )->withOptions([
                'verify' => false
            ])->get('https://export.meteobot.com/v2/Generic/Locate', [
                'id' => $stationId
            ]);

            if ($response->successful()) {
                $body = $response->body();

                // CSV datani parse qilish
                $acctArr = explode("\r", $body);
                $parsedData = [];

                if (count($acctArr) > 0) {
                    // Birinchi qator header bo'lishi mumkin
                    $headers = [];
                    $dataRows = [];

                    foreach ($acctArr as $index => $item) {
                        if (trim($item) != "" && $item != "\n") {
                            $row = str_getcsv($item, ';');

                            if ($index === 0) {
                                // Birinchi qator header bo'lishi mumkin
                                $headers = $row;
                            } else {
                                // Keyingi qatorlar data
                                $dataRows[] = $row;
                            }
                        }
                    }

                    // Agar header bo'lmasa, column indexlari bilan key yaratish
                    if (empty($headers)) {
                        // Eng oxirgi qatorni olib, har bir column uchun key yaratish
                        if (!empty($dataRows)) {
                            $lastRow = end($dataRows);
                            foreach ($lastRow as $index => $value) {
                                $parsedData['column_' . ($index + 1)] = $value;
                            }
                        } else {
                            // Agar faqat bitta qator bo'lsa
                            $firstRow = str_getcsv($acctArr[0], ';');
                            foreach ($firstRow as $index => $value) {
                                $parsedData['column_' . ($index + 1)] = $value;
                            }
                        }
                    } else {
                        // Header bor bo'lsa, header nomlari bilan key yaratish
                        if (!empty($dataRows)) {
                            $lastRow = end($dataRows);
                            foreach ($headers as $index => $header) {
                                $key = trim($header) ?: 'column_' . ($index + 1);
                                $parsedData[$key] = isset($lastRow[$index]) ? $lastRow[$index] : null;
                            }
                        } else {
                            // Agar faqat header bo'lsa
                            foreach ($headers as $index => $header) {
                                $key = trim($header) ?: 'column_' . ($index + 1);
                                $parsedData[$key] = null;
                            }
                        }
                    }
                }

                return response()->json([
                    'stationId' => $stationId,
                    'data' => $parsedData
                ]);
            } else {
                return response()->json([
                    'error' => 'Failed to fetch data from Meteobot API',
                    'status' => $response->status()
                ], $response->status());
            }

        } catch (\Exception $exception) {
            return response()->json([
                'error' => $exception->getMessage()
            ], 500);
        }
    }

    public function GetStationIndexFull(Request $request)
    {
        try {
            $stationId = $request->query('stationId') ?? $request->query('id');
            $startTime = $request->query('startTime');
            $endTime = $request->query('endTime');

            if (!$stationId) {
                return response()->json([
                    'error' => 'stationId or id parameter is required'
                ], 400);
            }

            if (!$startTime || !$endTime) {
                return response()->json([
                    'error' => 'startTime and endTime parameters are required'
                ], 400);
            }

            // Avval stationid bo'yicha qidirish
            $meteobot = MeteoBotStations::where('stationid', $stationId)->first();

            // Agar topilmasa, sn bo'yicha qidirish
            if (!$meteobot) {
                $meteobot = MeteoBotStations::where('sn', $stationId)->first();
            }

            if (!$meteobot) {
                return response()->json([
                    'error' => 'Station not found'
                ], 404);
            }

            if (!$meteobot->username || !$meteobot->password) {
                return response()->json([
                    'error' => 'Station credentials not found'
                ], 404);
            }

            // Meteobot API ga so'rov yuborish
            $response = Http::withBasicAuth(
                $meteobot->username,
                $meteobot->password
            )->withOptions([
                'verify' => false
            ])->get('https://export.meteobot.com/v2/Generic/IndexFull', [
                'id' => $stationId,
                'startTime' => $startTime,
                'endTime' => $endTime
            ]);

            if ($response->successful()) {
                $body = $response->body();

                // CSV datani parse qilish
                $acctArr = explode("\r", $body);
                $parsedData = [];
                $headers = [];

                if (count($acctArr) > 0) {
                    // Birinchi qator header
                    $firstRow = str_getcsv(trim($acctArr[0]), ';');
                    $headers = array_map('trim', $firstRow);

                    // Keyingi qatorlar data
                    for ($i = 1; $i < count($acctArr); $i++) {
                        $row = trim($acctArr[$i]);
                        if ($row != "" && $row != "\n") {
                            $rowData = str_getcsv($row, ';');

                            // Har bir qatorni JSON object qilib yaratish
                            $rowObject = [];
                            foreach ($headers as $index => $header) {
                                $key = $header ?: 'column_' . ($index + 1);
                                $rowObject[$key] = isset($rowData[$index]) ? $rowData[$index] : null;
                            }

                            // Bo'sh qatorlarni o'tkazib yuborish
                            if (!empty(array_filter($rowObject, function ($value) {
                                return $value !== null && $value !== '';
                            }))) {
                                $parsedData[] = $rowObject;
                            }
                        }
                    }
                }

                return response()->json([
                    'stationId' => $stationId,
                    'region_id' => $meteobot->region_id,
                    'district_id' => $meteobot->district_id,
                    'startTime' => $startTime,
                    'endTime' => $endTime,
                    'count' => count($parsedData),
                    'data' => $parsedData,

                ]);
            } else {
                return response()->json([
                    'error' => 'Failed to fetch data from Meteobot API',
                    'status' => $response->status()
                ], $response->status());
            }

        } catch (\Exception $exception) {
            return response()->json([
                'error' => $exception->getMessage()
            ], 500);
        }
    }
}
