<?php

namespace App\Console\Commands;

use App\Classes\Services;
use App\Exports\AirQualityExport;
use Illuminate\Console\Command;
use Maatwebsite\Excel\Facades\Excel;

class CommandAqiAir extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'airindex:get';

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
        $service = new Services();

        Excel::store(new AirQualityExport(), 'airquality.xls');

        $service->SendAirQuality();

    }
}
