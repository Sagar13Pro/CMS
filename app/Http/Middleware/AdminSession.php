<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class AdminSession
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
        if (!session()->has('admin_mail')) {
            return redirect(route('admin.login.view'));
        }
        return $next($request);
    }
}
