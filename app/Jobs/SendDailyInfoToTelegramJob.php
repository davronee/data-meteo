<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use App\Libraries\HTML_TO_DOC;
use App\Models\DailyStationInfo;
use App\Libraries\SendInfo\SendInfo;
use App\Libraries\SendInfo\Telegram;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Support\Facades\Log;

class SendDailyInfoToTelegramJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $dailyStationInfo;

    public function __construct(DailyStationInfo $dailyStationInfo)
    {
        $this->dailyStationInfo = $dailyStationInfo;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {

        // create doc file to send
        $htd = new HTML_TO_DOC();
        $file = storage_path("daily-station-info-telegram");
        $content = $this->dailyStationInfo->description;
        $htd->createDoc($content, $file);

        // send telegram
        $file .= ".doc";
        $telegram = new Telegram($file);
        $response = json_decode($telegram->send());

        if(isset($response->ok) && $response->ok) {
            return true;
        } else {
            Log::error(print_r($response, 1));
            throw new \Exception("Yuborilmadi");
        }

    }
}
