<?php

namespace App\Console\Commands;

use App\Classes\Services;
use Illuminate\Console\Command;

class ImsGetFacticConsole extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'ims:faktik';

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
//        $service = new Services();
//        $service->GetFaktikIms();
    }
}
