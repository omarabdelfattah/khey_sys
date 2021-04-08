<?php

namespace App\Http\Middleware;

use Closure;

class AdminPermission
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next,$role)
    {
        
        if(auth()->guard('admin')->user()->group->$role == 0){
            return back()->with('error', 'ليس لديك صلاحية لدخول هذه الصفحة'); 
        }
        return $next($request);
    }
}
