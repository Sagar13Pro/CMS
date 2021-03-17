<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class DeptMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if (!session()->has('dept_mail')) {
            return redirect(route('dept.login.view'));
        }
        return $next($request);
    }
}
