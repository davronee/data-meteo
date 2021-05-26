<?php

namespace App\Jobs;

use PDF;
use App\Models\QuickInfo;
use Illuminate\Bus\Queueable;
use App\Libraries\HTML_TO_DOC;
use Illuminate\Support\Facades\Log;
use App\Libraries\SendInfo\Telegram;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Contracts\Queue\ShouldBeUnique;

class SendQuickInfoToTelegramJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $quickInfo;

    public function __construct(QuickInfo $quickInfo)
    {
        $this->quickInfo = $quickInfo;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $chat_id = '-1001346632876';

        // create file to send
        // $htd = new HTML_TO_DOC();
        // $file = storage_path("daily-station-info-telegram");
        // $content = $this->dailyStationInfo->description;
        // $htd->createDoc($content, $file);

        $file = storage_path("quick-info-telegram.pdf");
        $pdf = PDF::setOptions(['dpi' => 150, 'defaultFont' => 'Arial'])->loadView('quick-info.pdf', ['quickInfo' => $this->quickInfo]);
        $pdf->save($file);

        // send telegram
        $telegram = new Telegram($file, $chat_id);
        $response = json_decode($telegram->send());

        if(isset($response->ok) && $response->ok) {
            return true;
        } else {
            Log::error(print_r($response, 1));
            throw new \Exception("Yuborilmadi");
        }

    }
}
