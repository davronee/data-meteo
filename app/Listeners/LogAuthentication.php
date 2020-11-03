<?php

namespace App\Listeners;

use App\Events\UserLoggedIn;
use App\Models\AuthLog;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class LogAuthentication
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  UserLoggedIn  $event
     * @return void
     */
    public function handle(UserLoggedIn $event)
    {
        // create auth log for current login
        AuthLog::create([
            'ip' => $event->request->ip(),
            'user_id' => $event->user->id
        ]);
    }
}
