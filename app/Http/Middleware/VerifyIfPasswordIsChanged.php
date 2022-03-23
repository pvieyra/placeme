<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class VerifyIfPasswordIsChanged
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next){
      //verifica si el password fue cambiado, de no ser asi no se puede entrar a la aplicacion.
      /*dd(Auth::user()->additional->change_password);*/
        if(Auth::check() && Auth::user()->additional->change_password == 0){
          return redirect()->route("users.change.password.form");
        }
        return $next($request);
    }
}
