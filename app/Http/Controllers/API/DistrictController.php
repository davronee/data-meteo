<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\District;
use App\Models\User;
use Illuminate\Http\Request;

class DistrictController extends Controller
{
    public function index(Request $request)
    {
        $user = User::find(base64_decode($request->input('user_id')));

        return District::where('regionid', $request->input('region_id'))
            ->filteredList()
            ->byRegion($user)
            ->pluck('nameUz', 'areaid')->toArray();
    }
}
