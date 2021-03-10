<?php

namespace App\Http\Middleware;

use Closure;

class VerificarRol
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

        $roles = array_slice(func_get_args(), 2);

        if (auth()->user()->hasRol($roles)) {
            return $next($request);
        }




        return redirect('/');
    }
}
