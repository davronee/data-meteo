<?php

namespace App\Classes;

use App\Models\MeteoBotStations;
use Carbon\Carbon;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Storage;

class MeteoBotService
{
    protected $stations = [];
    protected $apiToken = "1431648419:AAHns8IHW3T0HJMwOyFWL_pdrtB0CMEZ1rQ";
    protected $ChatId = '-1001426573564';

//    protected $ChatId = '69367740';

    public function GetStations()
    {
        $this->stations = MeteoBotStations::get();
        return $this->stations;
    }

    public function SentToTelegram()
    {
        foreach ($this->stations as $station) {

            $meteobot = Http::withOptions([
                'verify' => false
            ])->withBasicAuth($station->username, $station->password)->get('https://export.meteobot.com/v2/Generic/IndexFull', [
                'id' => $station->sn,//'3231343030303336',
                'startTime' => Carbon::now()->format('Y-m-d') . ' 00:00',
                'endTime' => Carbon::now()->format('Y-m-d') . ' ' . Carbon::now()->addDays(1)->addHour()->format('H') . ':00',
            ])->body();

            $acctArr = explode("\r", $meteobot);
            $values = "";
            foreach ($acctArr as $item) {
                if ($item != "\n")
                    $values = str_getcsv($item, ';');
            }


            $text = "&parse_mode=html&text=";
            if (!$station->is_has_aq) {
                $text .= "<b>Станция:</b> " . $station->name . PHP_EOL;
                $text .= "<b>Сана:</b> " . $values[1] . " " . $values[2] . PHP_EOL;
                $text .= "<b>Ҳаво Ҳарорат:</b> " . $values[3] . ' °C' . PHP_EOL;
                $text .= "<b>Ҳаво намлиги:</b> " . $values[4] . ' %' . PHP_EOL;
                $text .= "<b>Ёғингарчилик миқдори:</b> " . $values[7] . ' мм' . PHP_EOL;
                $text .= "<b>Тупроқ намлиги (-10см)</b> " . $values[9] . ' %' . PHP_EOL;
                $text .= "<b>Тупроқ ҳарорати(-10см):</b> " . $values[12] . ' °C' . PHP_EOL;
                $text .= "<b>Шамол тезлиги:</b> " . $values[8] . ' м/с' . PHP_EOL;
                $text .= "<b>Атмосфера босими:</b> " . $values[5] . ' гПа' . PHP_EOL;
                $text .= "<a href='https://data.meteo.uz/'>Батафсил</a> " . PHP_EOL;

            } else {
                $text .= "<b>Станция:</b> " . $station->name . PHP_EOL;
                $text .= "<b>Сана:</b> " . $values[1] . " " . $values[2] . PHP_EOL;
                $text .= "<b>Ҳаво Ҳарорат:</b> " . $values[3] . ' °C' . PHP_EOL;
                $text .= "<b>Ҳаво намлиги:</b> " . $values[4] . ' %' . PHP_EOL;
                $text .= "<b>Ёғингарчилик миқдори:</b> " . $values[7] . ' мм' . PHP_EOL;
                $text .= "<b>Тупроқ намлиги (-10см)</b> " . $values[10] . ' %' . PHP_EOL;
                $text .= "<b>Тупроқ ҳарорати(-10см):</b> " . $values[11] . ' °C' . PHP_EOL;
                $text .= "<b>PM2.5:</b> " . $values[13] . ' (соатлик миқдор) ' . ' µg/m³' . PHP_EOL;
                $text .= "<b>PM10:</b> " . $values[15] . ' (соатлик миқдор) ' . ' µg/m³' . PHP_EOL;
                $text .= "<b>CO2:</b> " . $values[17] . ' µg/m³' . PHP_EOL;
                $text .= "<b>Шамол тезлиги:</b> " . $values[8] . ' м/с' . PHP_EOL;
                $text .= "<b>Шамол йўналиши:</b> " . $values[9] . ' °' . PHP_EOL;
                $text .= "<b>Атмосфера босими:</b> " . $values[5]  . ' гПа' . PHP_EOL;
                $text .= "<a href='https://data.meteo.uz/'>Батафсил</a> " . PHP_EOL;
            }

            $http = Http::withOptions(['verify' => false])->get("https://api.telegram.org/bot$this->apiToken/sendMessage?chat_id=" . $this->ChatId . $text);


        }
    }

    public function SaveCsv()
    {

        foreach ($this->stations as $station) {
            $data = Http::withOptions(['verify' => false])->
            withBasicAuth($station->username, $station->password)->
            get('https://export.meteobot.com/v2/Generic/Index', [
                'id' => $station->sn,
                'startDate' => Carbon::now()->subDays(1)->format('Y-m-d'),
                'endDate' => Carbon::now()->format('Y-m-d'),
            ]);

            $filename = storage_path($station->sn . '.csv');

            file_put_contents($filename, $data->body());

        }
    }

    public function SendFileTelegram()
    {
        foreach ($this->stations as $station) {
            $bot_url = "https://api.telegram.org/bot" . $this->apiToken;
            $url = $bot_url . "/sendDocument?chat_id=" . $this->ChatId;

            $post_fields = ['chat_id' => $this->ChatId,
                'document' => new \CURLFile(storage_path($station->sn . '.csv'), 'text/csv', $station->sn . '.csv'),
                'parse_mode' => "HTML",
                'caption' => '<b>' . $station->name . '</b>' . PHP_EOL . Carbon::now()->format('d.m.Y'),

            ];


            $ch = curl_init();
            curl_setopt($ch, CURLOPT_HTTPHEADER, array(
                "Content-Type:multipart/form-data"
            ));
            curl_setopt($ch, CURLOPT_URL, $url);
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
            curl_setopt($ch, CURLOPT_POSTFIELDS, $post_fields);
            $output = curl_exec($ch);
        }
    }

}