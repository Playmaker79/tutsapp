<?php

namespace App\Http\Middleware;

use App\cv;
use Closure;
use Illuminate\Support\Facades\Auth;

class Newmentor
{
    /**
     * Handle an incoming request.
     * @return mixed
     * @internal param \Illuminate\Http\Request $request
     * @internal param Closure $next
     */



    public function handle($request, Closure $next)
    {
        $user = Auth::user();
         if(Auth::check() && Auth::user()->type=='admin'){
             return $next($request);
         }
         else{
             if($user->status == 0 && is_null($user->cv) ){
                 return redirect()->route('uploadCV');
             }else if($user->status == 1) {
                 return $next($request);
             }else{
                 return redirect()->route('blocked');
             }
         }
    }

}

