<?php

namespace App\Http\Middleware;

use Auth;
use Closure;
use Illuminate\Http\Request;
use App\Models\Constantes;

class CheckFuncionario {
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)     {
        if ( !auth()->check() ):
            return redirect()->route('login');
        endif;
        if ( !in_array(Auth::user()->COD_TIPO_USUARIO, [Constantes::TIPO_USUARIO_GERENTE,
                                                        Constantes::TIPO_USUARIO_FUNCIONARIO]) ):
            auth()->logout();
            return redirect()->route('home');
        endif;
        return $next($request);
    }
}
