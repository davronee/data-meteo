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
        $this->get(true);

    }

    public function get($send = false)
    {
        $data = json_decode(file_get_contents(asset('storage/apmmeteodata.json')), true);
        $data['date'] = Carbon::parse($data['date'])->subHours(3)->format("d.m.Y H:i:s");

        if ($send) {
            $telegramUrl = "https://api.telegram.org/bot";
            $chatId = -1001502437705;
//        $chatId = 69367740;
            $token = "1808089370:AAHRYlkMEO8zrah-bv13omilWcDy0f9hrFg";

            $url = $telegramUrl . $token . "/sendMessage?chat_id=" . $chatId;


            $text = "&parse_mode=html&text=" . "<b>Янги Ўзбекистон</b>" . PHP_EOL;
            foreach ($data as $key => $value) {
                $key != 'date' ? $value = round($value, 2) : $value = $value;
                $key == 'date' ? $key = 'Последняя обновление' : $key = $key;
                $text .= "<b>$key</b> :  $value" . PHP_EOL;
            }
            Http::withOptions(['verify' => false])->get($url . $text);
        }


        return $data;
    }

    public function view()
    {
        return view('pages.apm_meteo_umb');

    }
}
