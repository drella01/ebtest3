<?php

namespace App\Http\Middleware;

use Closure;

class IpAccess
{
    public $ip=['88.29.164.25','83.58.62.222','95.127.150.161','81.35.37.160','83.58.67.181','193.153.58.161','81.34.51.26','2.136.176.62','83.58.206.154'];

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (!in_array($request->ip(), $this->ip)) {
            return abort(403,'No auhorized');
            //return redirect()->route('type.index');
        }
        return $next($request);
    }
}
