<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Auth;

//use App\Models\User;

class numssidebar
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
        $numssidebar = [
            'myarts' => Auth::user()->articles->count(),
            'favs' => Auth::user()->likes->count(),
            'plans' => Auth::user()->plans->count(),
            'suscrit' => Auth::user()->suscrit->count(),
            

        ];
        view()->share('nums',$numssidebar);
        //dd( Auth::user()->suscrit->count());
        return $next($request);
    }
}
