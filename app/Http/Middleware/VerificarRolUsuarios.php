<?php

namespace App\Http\Middleware;

use Closure;

class VerificarRolUsuarios
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
      $roles = func_get_args();
      $roles = array_slice($roles, 2);
      foreach ($roles as $rol ) {
     //dd(auth()->user()->id_rol === (int)$rol);
        if (auth()->user()->id_rol === (int)$rol) {
          return $next($request);
        }
      }
        return redirect('/equipos');
    }
}
