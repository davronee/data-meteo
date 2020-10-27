<?php

namespace App\Http\Middleware;

use App;
use Config;
use Closure;
use Illuminate\Support\Facades\Session;

class SetLocale
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $locale = 'ru';
        if (Session::has('locale')) $locale = Session::get('locale', Config::get('app.locale'));

        App::setLocale($locale);
        return $next($request);

    }
}
