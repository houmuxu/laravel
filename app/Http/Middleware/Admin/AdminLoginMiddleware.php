<?php

namespace App\Http\Middleware\Admin;

use Closure;

class AdminLoginMiddleware
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
        if(session('aname')){

            return $next($request);

        } else {

            return redirect('/admin/login');
        }
    }
}
