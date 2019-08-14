<?php

namespace App\Http\Middleware;

use Closure;
use Auth;
use App\User;

class EnterpriseMiddleware
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
        if (auth()->user()->profile_type === 'Enterprise')
        {
             return $next($request);
        }
        else
        {
            return redirect('auth.login')->with('status', 'ACCESS DENIED'); 
        }
    }
}
