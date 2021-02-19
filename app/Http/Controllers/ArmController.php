<?php

namespace App\Http\Controllers;

use App\Models\Arm;
use Illuminate\Http\Request;

class ArmController extends Controller
{
    public function index(Request $request)
    {
        $arms = Arm::query()
        ->select('device')
        ->selectRaw('max(did) as id')
        ->groupBy('device')->get();

        $array = [];
        foreach ($arms as $item)
        {
            $raw = Arm::where('did',$item->id)->first();

           $exp = explode(';',$raw->data);

           $object = [
               'date'=>$exp[0],
               'time'=>$exp[1],
               'type'=>$exp[2],
               'id'=>$exp[3],
               'voltage'=>$exp[4],
               'fraction_concentration_pm2,5'=>$exp[5],
               'fraction_concentration_pm10'=>$exp[6],
               'temp'=>$exp[9],
               'atmospheric_pressure'=>$exp[10],
               'outdoor_temp'=>$exp[11],
               'air_humidity'=>$exp[12],
               'comment'=>$exp[13],
           ];

           array_push($array,$object);
        }

        return $array;


    }
}
