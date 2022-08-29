<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ApmMeteoUmbController extends Controller
{
    public function GetPost(Request $request)
    {

        Storage::disk('public')->put('apmmeteodata.json', $request->getContent());


    }
}
