<?php

namespace App\Http\Controllers;

use App\Imports\HoribaImportJson;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Maatwebsite\Excel\Facades\Excel;

class HoribaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($station)
    {
        return view('pages.horiba.files', compact('station'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request,$station)
    {

        $request->validate([
            'file'=> 'required|mimes:xlsx,xls'
        ]);

        $file = $request->file('file');

        $response = Storage::disk('local')->putFileAs(
            'uploads',
            $file,
            $station.'.'.$file->getClientOriginalExtension()
        );


//        $response = $file->store('uploads/'.$station, 'public');


        return redirect()
            ->back()
            ->with('success','Файл юкланди.')
            ->with('file', $response);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function show($station)
    {
        $data = Excel::toCollection(new HoribaImportJson(), storage_path('app/uploads/'.$station.'.xlsx'));

        $data = $data[0]->filter(function ($value, $key) {
            return $value['pm25'] != 'NoData' &&
                $value['date_time'] != 'Minimum' &&
                $value['date_time'] != 'MinDate' &&
                $value['date_time'] != 'STD' &&
                $value['date_time'] != 'Data[%]' &&
                $value['date_time'] != 'Num' &&
                $value['date_time'] != 'Avg' &&
                $value['date_time'] != 'MaxDate' &&
                $value['date_time'] != 'Maximum';
        });

        $lastRow = $data->last();

        // dd/mm/YYYY HH:mm:ss format to YYYY-mm-dd HH:mm:ss
        $lastRow['date_time'] = date('Y-m-d H:i:s', strtotime(str_replace('/', '-', $lastRow['date_time'])));

        return  response()->json([
            'PM2.5' => $lastRow['pm25'],
            'PM10' => $lastRow['pm10'],
            'CO' => $lastRow['co'],
            'so2' => $lastRow['so2'],
            'no' => $lastRow['no'],
            'no2' => $lastRow['no2'],
            'nox' => $lastRow['nox'],
            'o3' => $lastRow['o3'],
            'nox_2' => $lastRow['nox_2'],
            'nh3' => $lastRow['nh3'],
            'datetime' => $lastRow['date_time'],
        ]);



    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
