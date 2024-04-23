<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class HourlyStationWorkHour
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        $user = auth()->user();
        if(!$user->isInWorkHour()) abort('403');
        return $next($request);
    }
}
