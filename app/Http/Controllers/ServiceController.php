<?php

namespace App\Http\Controllers;

use App\Models\OrdersService;
use App\Models\Region;
use App\Models\Services;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $regions = Region::orderBy('regionid', 'asc')
            ->whereUserRegion(auth()->user()->region_id)
            ->pluck('nameRu', 'regionid')
            ->toArray();
        $services = Services::where('isActive', true)->get();
        return view('pages.service.service',
            compact('regions', 'services')
        );
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
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'user_type' => 'required',
            'fio' => 'required',
            'tin' => 'required',
            'email' => 'required',
            'phone' => 'required',
            'type_service' => 'required',
            'region' => 'required',
        ]);

        $orders = new OrdersService();
        $orders->user_id = Auth::id();
        $orders->region_id = $request->region;
        $orders->service_id = $request->type_service;
        $orders->fio = $request->fio;
        $orders->phone = $request->phone;
        $orders->tin = $request->tin;
        $orders->email = $request->email;
        $orders->user_type = $request->user_type;
        $orders->save();

        return redirect()->route('service.index')->with('status', trans('messages.sent_successfully'));


    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
