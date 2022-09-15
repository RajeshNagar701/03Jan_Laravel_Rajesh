<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class afterlogincompany
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        if(Session()->has('company_id'))
		{
			
		}
		else
		{
			return redirect('company');
		}
        return $next($request);
    }
}
