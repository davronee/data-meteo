<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Storage;

class ApmMeteoUmbController extends Controller
{
    public function GetPost(Request $request)
    {
        Storage::disk('public')->put('apmmeteodata.json', $request->getContent());
    }

    public function get()
    {
        $data = json_decode(file_get_contents(asset('storage/apmmeteodata.json')), true);
        $data['date'] = Carbon::parse($data['date'])->subHours(4)->format("d.m.Y H:i:s");
        return $data;
    }

    public function view()
    {
        return view('pages.apm_meteo_umb');

    }
}
