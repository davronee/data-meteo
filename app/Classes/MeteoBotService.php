<?php

namespace App\Classes;

use App\Models\MeteoBotStations;
use Carbon\Carbon;
use Illuminate\Support\Facades\Http;

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
                $text .= "<b>Номи:</b> " . $station->name . PHP_EOL;
                $text .= "<b>Сана:</b> " . $values[1] . " " . $values[2] . PHP_EOL;
                $text .= "<b>Ҳарорат:</b> " . $values[3] . PHP_EOL;
                $text .= "<b>Ҳаво намлиги:</b> " . $values[4] . PHP_EOL;
                $text .= "<b>Ёғингарчилик миқдори:</b> " . $values[7] . PHP_EOL;
                $text .= "<b>Тупроқ намлиги ва ҳарорати:</b> " . $values[9] . "," . $values[12] . PHP_EOL;
                $text .= "<b>Шамол тезлиги ва йўналиши:</b> " . $values[8] . PHP_EOL;
                $text .= "<b>Атмосфера босими:</b> " . $values[6] . PHP_EOL;
            } else {
                $text .= "<b>Номи:</b> " . $station->name . PHP_EOL;
                $text .= "<b>Сана:</b> " . $values[1] . " " . $values[2] . PHP_EOL;
                $text .= "<b>Ҳарорат:</b> " . $values[3] . PHP_EOL;
                $text .= "<b>Ҳаво намлиги:</b> " . $values[4] . PHP_EOL;
                $text .= "<b>Ёғингарчилик миқдори:</b> " . $values[7] . PHP_EOL;
                $text .= "<b>Тупроқ намлиги ва ҳарорати:</b> " . $values[10] . "/" . $values[11] . PHP_EOL;
                $text .= "<b>PM2.5:</b> " . $values[13] . PHP_EOL;
                $text .= "<b>PM10:</b> " . $values[15] . PHP_EOL;
                $text .= "<b>Co2:</b> " . $values[17] . PHP_EOL;
                $text .= "<b>Шамол тезлиги ва йўналиши:</b> " . $values[8] . "," . $values[9] . PHP_EOL;
                $text .= "<b>Атмосфера босими:</b> " . $values[6] . PHP_EOL;
            }

            dd($text);
            $http = Http::withOptions(['verify' => false])->get("https://api.telegram.org/bot$this->apiToken/sendMessage?chat_id=" . $this->ChatId . $text);


        }
    }

}