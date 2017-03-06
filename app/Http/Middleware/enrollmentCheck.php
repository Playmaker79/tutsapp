<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class enrollmentCheck
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
        $course_id =  hd($request->route('id'));
        $enrollment = Auth::user()->enrollment()->status(1);
        if(nothing($enrollment)){
            return redirect()->back()->with([
                'title' => 'Permission Denied',
                'message' => 'You dont have permission viewing the course!',
                'type' => 'warning',
            ]);
        }
        else{
            if($enrollment->course_id == $course_id){
                return $next($request);
            }else{
                return $enrollment->course_id;
                return redirect()->back()->with([
                    'title' => 'Permission Denied',
                    'message' => 'You dont have permission viewing the course!',
                    'type' => 'warning',
                ]);
            }
        }
    }
}
