<?php

namespace App\Http\Middleware;

use Auth;
use Closure;
use Illuminate\Http\Request;

class isProfileFilled
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
        $user = Auth::user();

        /**
         * if user is new and profile is not filled yet
         * redirect to the profile edit page
         */
        if(!$user->profileIsFilled()) {
            return redirect()->route('user-profile.edit', $user->id)->with('error', trans('messages.profile_not_filled'));
        }

        return $next($request);
    }
}
