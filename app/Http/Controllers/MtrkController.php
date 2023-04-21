<?php

namespace App\Http\Controllers;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use App\Http\Controllers\Controller;

class MtrkController extends Controller
{
    public function getReport(Request $request)
    {
        $response = Http::withOptions(["verify" => false])->get('https://api.telegram.org/bot1226205380:AAE2V8xQ4wN3649G9razmteQhgtEHBI84Y4/getUpdates');
        $updates = $response->json();
        $objects = "<b>Ўзбекистон миллий телерадиокомпаниясининг телеграмдаги расмий каналида " . Carbon::now()->format('d.m.Y') . " кунги жойлаштирилган материаллар</b>" . PHP_EOL . PHP_EOL;
        foreach ($updates['result'] as $item) {
            if (isset($item['channel_post'])) {
                $message_id = $item['channel_post']['message_id'];
                $caption_edit = null;
                foreach ($response['result'] as $item_edit) {
                    if (isset($item_edit['edited_channel_post']['video'])) {
                        if ($item_edit['edited_channel_post']['message_id'] == $message_id) {
                            $caption_edit = preg_split("/\\r\\n|\\r|\\n/", $item_edit['edited_channel_post']['caption'])[0];
                        }
                    }
                }
                if ($caption_edit) {
                    $message_id = $item['channel_post']['message_id'];
                    if (strlen($objects) < 7000 && strlen($objects) >= 220) {
                        $objects .= '❖ ' . '<a href=\'t.me/mtrkuzofficial/' . $message_id . '\'>' . $caption_edit . '</a>' . PHP_EOL;
                    } else {
                        $data = [
                            'text' => $objects,
                            'chat_id' => 69367740,
                            'parse_mode' => 'HTML',
                            'disable_web_page_preview' => true
                        ];
                        $dataAnvar = [
                            'text' => $objects,
                            'chat_id' => 3708889,
                            'parse_mode' => 'HTML',
                            'disable_web_page_preview' => true
                        ];
                        $response = Http::withOptions(["verify" => false])->get("https://api.telegram.org/bot1226205380:AAE2V8xQ4wN3649G9razmteQhgtEHBI84Y4/sendMessage?" . http_build_query($data));
                        $response = Http::withOptions(["verify" => false])->get("https://api.telegram.org/bot1226205380:AAE2V8xQ4wN3649G9razmteQhgtEHBI84Y4/sendMessage?" . http_build_query($dataAnvar));
                        $objects = "<b>Ўзбекистон миллий телерадиокомпаниясининг телеграмдаги расмий каналида " . Carbon::now()->format('d.m.Y') . " кунги жойлаштирилган материаллар (давоми)</b>" . PHP_EOL . PHP_EOL;
                    }
                } else {
                    if (isset($item['channel_post']['video'])) {
                        $message_id = $item['channel_post']['message_id'];
                        $caption = preg_split("/\\r\\n|\\r|\\n/", $item['channel_post']['caption'])[0];

                        if (strlen($objects) < 7000 && strlen($objects) >= 220) {
                            $objects .= '❖ ' . '<a href=\'t.me/mtrkuzofficial/' . $message_id . '\'>' . $caption . '</a>' . PHP_EOL;

                        } else {
                            $data = [
                                'text' => $objects,
                                'chat_id' => 69367740,
                                'parse_mode' => 'HTML',
                                'disable_web_page_preview' => true
                            ];
                            $dataAnvar = [
                                'text' => $objects,
                                'chat_id' => 3708889,
                                'parse_mode' => 'HTML',
                                'disable_web_page_preview' => true
                            ];
                            $response = Http::withOptions(["verify" => false])->get("https://api.telegram.org/bot1226205380:AAE2V8xQ4wN3649G9razmteQhgtEHBI84Y4/sendMessage?" . http_build_query($data));
                            $response = Http::withOptions(["verify" => false])->get("https://api.telegram.org/bot1226205380:AAE2V8xQ4wN3649G9razmteQhgtEHBI84Y4/sendMessage?" . http_build_query($dataAnvar));
                            $objects = "<b>Ўзбекистон миллий телерадиокомпаниясининг телеграмдаги расмий каналида " . Carbon::now()->format('d.m.Y') . " кунги жойлаштирилган материаллар (давоми)</b>" . PHP_EOL . PHP_EOL;

                        }
                    }
                }
            }
        }
        if (strlen($objects) != 220) {
            $data = [
                'text' => $objects,
                'chat_id' => 69367740,
                'parse_mode' => 'HTML',
                'disable_web_page_preview' => true
            ];
            $dataAnvar = [
                'text' => $objects,
                'chat_id' => 3708889,
                'parse_mode' => 'HTML',
                'disable_web_page_preview' => true
            ];
            $response = Http::withOptions(["verify" => false])->get("https://api.telegram.org/bot1226205380:AAE2V8xQ4wN3649G9razmteQhgtEHBI84Y4/sendMessage?" . http_build_query($data));
            $response = Http::withOptions(["verify" => false])->get("https://api.telegram.org/bot1226205380:AAE2V8xQ4wN3649G9razmteQhgtEHBI84Y4/sendMessage?" . http_build_query($dataAnvar));

        }
        return $response;
    }

    public function offset()
    {
        $remove = Http::withOptions(["verify" => false])->get("https://api.telegram.org/bot1226205380:AAE2V8xQ4wN3649G9razmteQhgtEHBI84Y4/getUpdates?offset=-1");

        return $remove;
    }
}
