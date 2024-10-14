<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class AmudarController extends Controller
{
    private $endporint = 'https://oxus.amudar.io/api/';
    private $email = 'irrigatsiya@amudar.io';
    private $password = 'irrigatsiya-1';

    public function GetToken()
    {
        $token = Http::post($this->endporint . 'login', [
            'email' => $this->email,
            'password' => $this->password
        ]);
        return $token->json();
    }

    public function GetDevice()
    {
        $devices = Http::withToken($this->GetToken()['token'])->get($this->endporint . 'user/devices?locale=uz');
        return $devices->json();
    }

    public function GetData()
    {
        $current_data = [];
        foreach ($this->GetDevice()['data'] as $item) {
            $data = Http::withToken($this->GetToken()['token'])->post($this->endporint . 'influx/meteostation?locale=uz', [
                'stationId' => $item['serial_number'],
                'start' => '-3h',
                'end' => 'now()',
                'interval' => '1h',
            ]);

            array_push($current_data, ['name' => $item['name'], 'geolocation' => $item['geolocation'], 'data' => end($data->json()['data'])]);
        }

        return $current_data;
    }
}
