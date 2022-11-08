<?php

namespace App\Http\Middleware;

use App\Models\Curso;
use Closure;
use Illuminate\Http\Request;
use Session;

class EsMayorDeEdad
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        // $id = $request->route()->parameter('id');
        // $curso = Curso::findOrFail($id);
        if (/*$curso->clasificacion_id = 2 && */!Session::has('mayorDeEdad')) {
            return redirect()->route('confirmar-mayoria-edad.form');
        }

        return $next($request);
    }
}
