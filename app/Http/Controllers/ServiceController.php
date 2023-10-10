<?php

namespace App\Http\Controllers;

use App\Models\OrdersService;
use App\Models\Region;
use App\Models\ServiceLogs;
use App\Models\Services;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;

class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $endpoint = 'https://back-ijro.meteo.uz/correspondence/open/application';
        $regions = Http::withOptions([
            'verify' => false
        ])->get($endpoint . '/classifier/region/list')->json();

        $services = Http::withOptions([
            'verify' => false
        ])->get($endpoint . '/classifier/service-type')->json();

        $user_types = Http::withOptions([
            'verify' => false
        ])->get($endpoint . '/classifier/user-type')->json();

        $regions = $regions['content'] ?? [];
        $services = $services['content'] ?? [];
        $user_types = $user_types['content'] ?? [];

//        $regions = Region::orderBy('regionid', 'asc')
//            ->whereUserRegion(auth()->user()->region_id)
//            ->pluck('nameRu', 'regionid')
//            ->toArray();
//        $services = Services::where('isActive', true)->get();
        return view('pages.service.service',
            compact('regions', 'services', 'user_types')
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
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Http\Response
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
            'regionid' => 'required',
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

//        $serv = Services::find($request->type_service);
//        $region = Region::where('regionid', $request->region)->first();
//        $details = [
//            'user_type' => Auth::user()->user_type,
//            'fio' => $request->fio,
//            'id_order' => $orders->id,
//            'pinfl' => Auth::user()->pin,
//            'tin' => $request->tin,
//            'email' => $request->email,
//            'phone' => $request->phone,
//            'service' => $serv->name,
//            'region' => $region->nameUz,
//        ];

//        Mail::to('services@meteo.uz')->send(new \App\Mail\ServiceMail($details));
//        Mail::to($request->email)->send(new \App\Mail\ClientMail($details));

        try {

//https://devback-ijro.meteo.uz/correspondence/open/application
            $entitiy = Http::withOptions([
                'verify' => false
            ])->post('https://back-ijro.meteo.uz/correspondence/open/application', [
                "full_name" => $request->fio ?? '',
                "email" => $request->email ?? '',
                "pinfl" => strval($request->pinfl) ?? '',
                "tin" => $request->tin ?? '',
                "phone_number" => $request->phone ?? '',
                "region_code" => $request->regionid ?? '',
                "service_id" => $request->type_service ?? '',
                "user_type_id" => $request->user_type
            ]);

            $entitiy = $entitiy->json();


            if (isset($entitiy['content'])) {
                ServiceLogs::create([
                    'flag' => 'ACCEPT',
                    'request' => json_encode($request->all()),
                    'response' => json_encode($entitiy['content']),
                    'response_id' => $entitiy['content']['id'],
                ]);
            } else {
                ServiceLogs::create([
                    'flag' => 'ERROR',
                    'request' => json_encode($request->all()),
                    'response' => json_encode($entitiy['content']),
                    'response_id' => $entitiy['content']['id'],
                ]);
            }


        } catch (\Exception $exception) {
            ServiceLogs::create([
                'flag' => 'ERROR',
                'request' => json_encode($request->all()),
                'errors' => 'line: : ' . $exception->getLine() . ' - ' . ' meesage: ' . $exception->getMessage(),
            ]);
        }

        return redirect()->route('service.index')->with('status', 'Ваше сообщение отправлено и мы свяжемся с вами в ближайшее время! Номер вашей заявки: ' . $entitiy['content']['id'] . '. Статус заявки можно узнать по телефону 78 1508650.');
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
