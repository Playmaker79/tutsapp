<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

/*
 * Middleware for checking wether  the user has previlages
 *
 * */
class RoleCheck
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  $role
     * @return mixed
     */

    public function handle($request, Closure $next,$role)
    {
        if(Auth::check() && Auth::user()->type == 'admin') {
            return $next($request);
        }
        else if(Auth::check() && Auth::user()->type == $role){
            return $next($request);
        }
        else if(Auth::check() && $role == 'user'){
            return $next($request);
        }
        else{
            /*redirect user to blocked page*/
            return redirect()->route('blocked');
        }
    }

}
