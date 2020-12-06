<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\District;
use Illuminate\Http\Request;

class DistrictController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return District::where('regionid', $request->input('region_id'))
            ->whereNotIn('areacode', [260, 200, 400])
            ->pluck('nameUz', 'areaid')
            ->toArray();
    }
}
