<?php

namespace App\Http\Middleware;

use Closure;

class deptprevent
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
        if(!Session()->get('role1'))
        {
      
            return redirect()->route('login');
        
        }
       
        return $next($request);
    }

}
