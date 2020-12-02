<?php

namespace App\Console\Commands;

use App\Models\Meteo;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;

class getMeteo extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'meteo:get';

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
       $get_meteo = Http::get('http://www.meteo.uz/api/v2/weather/current.json?city=tashkent&language=ru');

        $meteo = $get_meteo->json();


        dd($meteo['id']);
    }
}
