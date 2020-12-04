<?php

namespace App\Console;

use App\Console\Commands\getMeteo;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    /**
     * The Artisan commands provided by your application.
     *
     * @var array
     */
    protected $commands = [
            'App\Console\Commands\getMeteo',
    ];

    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        $schedule->command('meteo:get')->daily()->at('21:40');
        // $schedule->command('inspire')->hourly();
        $schedule->command('meteo:get')->daily()->at('02:15');
        $schedule->command('meteo:get')->daily()->at('05:15');
        $schedule->command('meteo:get')->daily()->at('08:15');
        $schedule->command('meteo:get')->daily()->at('11:15');
        $schedule->command('meteo:get')->daily()->at('14:15');
        $schedule->command('meteo:get')->daily()->at('17:15');
        $schedule->command('meteo:get')->daily()->at('20:15');
        $schedule->command('meteo:get')->daily()->at('23:15');
    }

    /**
     * Register the commands for the application.
     *
     * @return void
     */
    protected function commands()
    {
        $this->load(__DIR__.'/Commands');

        require base_path('routes/console.php');
    }
}
