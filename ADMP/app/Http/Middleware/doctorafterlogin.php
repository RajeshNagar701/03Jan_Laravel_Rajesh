<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class doctorafterlogin
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
        if(Session()->has('doctor_id'))
		{
			
		}
		else
		{
			return redirect('doctor');
		}
        return $next($request);
    }
}
