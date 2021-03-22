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
            $raw = Arm::where('device',$item->device)->orderbyDesc('did')->first();

           $exp = explode(';',$raw->data);

           $object = [
               'date'=>$exp[0] , // дата
               'time'=>$exp[1], // время
               'type'=>$exp[2], // тир
               'id'=>$exp[3], // ID
               'voltage'=>$exp[4], // naprejeniya  na vihode fotometra v rejime produva (produv mB)
               'fraction_concentration_pm25'=>$exp[5], // konsentratsiya fraksii rm2,5 v mkg/m 3
               'fraction_concentration_pm10'=>$exp[6], // konsentratsiya fraksii rm10 v mkg/m 3
               'temp'=>$exp[9], //temprature v bloke fotometra
               'atmospheric_pressure'=>$exp[10], // temprature atmasfernogo davleniya
               'outdoor_temp'=>$exp[11],// tekushaya znacheniya narujnogo vozduha
               'air_humidity'=>$exp[12], // tekushaya znaheniya otnositelna  lajnosti vozduxa
               'comment'=>$exp[13], // primicheniya
               'time'=>$raw->time
           ];

           array_push($array,$object);
        }

        return $array;
    }

    public function get(Request $request,$id)
    {
        $raw = Arm::where('device',$id)->orderbyDesc('did')->first();


        if($raw)
        {
            $exp = explode(';',$raw->data);
            $object = [
                'date'=>$exp[0] , // дата
                'time'=>$exp[1], // время
                'type'=>$exp[2], // тир
                'id'=>$exp[3], // ID
                'voltage'=>$exp[4], // naprejeniya  na vihode fotometra v rejime produva (produv mB)
                'fraction_concentration_pm25'=>$exp[5], // konsentratsiya fraksii rm2,5 v mkg/m 3
                'fraction_concentration_pm10'=>$exp[6], // konsentratsiya fraksii rm10 v mkg/m 3
                'temp'=>$exp[9], //temprature v bloke fotometra
                'atmospheric_pressure'=>$exp[10], // temprature atmasfernogo davleniya
                'outdoor_temp'=>$exp[11],// tekushaya znacheniya narujnogo vozduha
                'air_humidity'=>$exp[12], // tekushaya znaheniya otnositelna  lajnosti vozduxa
                'comment'=>$exp[13], // primicheniya
                'time'=>$raw->time
            ];

            return response()->json($object);
        }
        else
        {
            return response()->json(['error' => 'Not found'], 404);
        }


    }

}
