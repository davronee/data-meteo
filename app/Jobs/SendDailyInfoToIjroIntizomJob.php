<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use App\Libraries\HTML_TO_DOC;
use App\Models\DailyStationInfo;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Contracts\Queue\ShouldBeUnique;

class SendDailyInfoToIjroIntizomJob implements ShouldQueue
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
        $content = $this->dailyStationInfo->description;
        $htd->createDoc($content, storage_path("daily-station-info-ijro"));
    }
}
