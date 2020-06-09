<?php

/**
 * Javier Molina
 * curso 2019/20
 */

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class CheckUser
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, $admin)
    {
        $user = Auth::user() ;

        // si el usuario es admin y accede a una ruta admin continua la ejecucion
        if ($user->admin):
            if($admin=="yes"):
                return $next($request);
            else:
                return redirect()->route('usuario.crud');
            endif;
        endif;

        //si el usuario es cliente
        if($admin=="no"):
            return $next($request);
        else:
            return redirect()->route('inicio');
        endif;
        
        

    }
}