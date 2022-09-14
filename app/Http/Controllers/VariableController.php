<?php

namespace App\Http\Controllers;

use App\Models\Station;
use App\Models\Variable;
use Illuminate\Http\Request;

class VariableController extends Controller
{

    public function getStations()
    {
        $stations = Station::where('id', '<>', 1)->get();
        return $stations;
    }

    public function getStation($id, $year = 2020)
    {
        $stations = Station::find($id)->variable()
            ->where('year', $year)
            ->first();
        return [
            'id'=>$stations->id,
            'key'=>$stations->key,
            'value'=>json_decode($stations->value,1),
            'year'=>$stations->year,
            'variableId'=>$stations->variableId,
            'created_at'=>$stations->created_at,
            'updated_at'=>$stations->updated_at,
        ];
    }

    public function years()
    {
        $years = Variable::select('year')->groupby('year')->get();

        return $years;
    }
}
