<?php

namespace App\Http\Middleware;

use Closure;
use App\Model\Admin\Admin;

class Hasper
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
        $admin = Admin::find(session('aid'));
       
        $role = $admin->roles;
        $url = [];
        foreach ($role as $k => $v) {
            $per = $v->permissions;
            foreach ($per as $kk => $vv) {
                $url[] = $vv->url;
            }
        }
        $urls = array_unique($url);
        $routes = \Route::current()->getActionName();
        if(in_array($routes, $urls)){

            return $next($request);
        } else {
            return redirect('/admin/noper');
        }
       

    }
}
