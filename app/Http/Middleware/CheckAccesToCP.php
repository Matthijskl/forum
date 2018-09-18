<?php

namespace App\Http\Middleware;

use App\Helpers\PermissionHelper;
use Closure;

class CheckAccesToCP
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
        if(PermissionHelper::has('can_enter_cp') == true)
        {
            return $next($request);
        }

        return redirect('home');
    }
}
