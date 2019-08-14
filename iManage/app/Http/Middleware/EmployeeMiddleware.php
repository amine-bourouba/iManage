<?php

namespace App\Http\Middleware;

use Closure;

class EmployeeMiddleware
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
        if (auth()->user()->profile_type === 'Employee')
        {
             return $next($request);
        }
        else
        {
            return redirect('auth.login')->with('status', 'ACCESS DENIED'); 
        }
    }
}
