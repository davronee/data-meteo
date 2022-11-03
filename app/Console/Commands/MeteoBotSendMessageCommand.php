<?php

namespace App\Console\Commands;

use App\Classes\MeteoBotService;
use Illuminate\Console\Command;

class MeteoBotSendMessageCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'meteobot:send';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $service = new MeteoBotService();
        $service->GetStations();
        $service->SentToTelegram();
    }
}
