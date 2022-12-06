<?php

namespace App\Console;

use App\Console\Commands\getMeteo;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;
use App\Console\Commands\Aerisweather;

class Kernel extends ConsoleKernel
{
    /**
     * The Artisan commands provided by your application.
     *
     * @var array
     */
    protected $commands = [
        'App\Console\Commands\getMeteo',
        Aerisweather::class
    ];

    /**
     * Define the application's command schedule.
     *
     * @param \Illuminate\Console\Scheduling\Schedule $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        $schedule->command('meteo:get')->dailyAt('21:40');
        // $schedule->command('inspire')->hourly();
        $schedule->command('meteo:get')->dailyAt('02:15');
        $schedule->command('meteo:get')->dailyAt('05:15');
        $schedule->command('meteo:get')->dailyAt('08:15');
        $schedule->command('meteo:get')->dailyAt('11:15');
        $schedule->command('meteo:get')->dailyAt('14:15');
        $schedule->command('meteo:get')->dailyAt('17:15');
        $schedule->command('meteo:get')->dailyAt('20:15');
        $schedule->command('meteo:get')->dailyAt('23:15');

        $schedule->command('meteobot:send')->dailyAt('07:00');
        $schedule->command('meteobot:send')->dailyAt('17:00');
        $schedule->command('meteobot:SendFile')->dailyAt('18:00');
        $schedule->command('airindex:get')->dailyAt('19:00');


        $schedule->command('weather:forecast')->dailyAt('11:00');
        $schedule->command('weather:check')->hourly();
        $schedule->command('ims:faktik')->everyTenMinutes();
    }

    /**
     * Register the commands for the application.
     *
     * @return void
     */
    protected function commands()
    {
        $this->load(__DIR__ . '/Commands');

        require base_path('routes/console.php');
    }
}
