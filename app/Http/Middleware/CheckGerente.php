<?php

namespace App\Http\Middleware;

use Auth;
use Closure;
use Illuminate\Http\Request;
use App\Models\Constantes;

class CheckGerente {
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next) {
        if ( !auth()->check() ):
            return redirect()->route('login');
        endif;
        if ( Auth::user()->COD_TIPO_USUARIO !== Constantes::TIPO_USUARIO_GERENTE):
            auth()->logout();
            return redirect()->route('home');
        endif;
            
        return $next($request);
    }
}