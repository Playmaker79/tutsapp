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
        if($user->type == 'mentor' && $user->status == 0 && is_null($user->cv) ){
            return $next($request);

        } else {

            return redirect()->route('mentorDash');
        }
    }

}

