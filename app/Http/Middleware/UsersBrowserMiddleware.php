<?php

namespace App\Http\Middleware;

use Closure;
use Browser;
class UsersBrowserMiddleware
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
        $browser_name = Browser::browserName();
        $session_id = session()->getId();
        $browsers = \Cache::get('browsers',[]);
        if (!array_key_exists($browser_name,$browsers)
            || !in_array($session_id, $browsers[$browser_name]))
        {
            $browsers[$browser_name][] = $session_id;
            \Cache::put('browsers',$browsers);
        }


        return $next($request);
    }
}
