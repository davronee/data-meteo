<?php

namespace App\Console\Commands;

use App\Classes\Services;
use Illuminate\Console\Command;

class Aerisweather extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'weather:forecast';

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
        //Services::GetAerisweather();
//        Services::GetDarkSky();
        //Services::WeatherBit();
        Services::GetUzhydromet();
        //Services::Accuweather();
        //Services::OpenWeather();
    }
}
