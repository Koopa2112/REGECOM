<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class puesto_empleadoMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle($request, Closure $next, $role)
{
    if ($request->user() && $request->user()->puesto_empleado == $role) {
        return $next($request);
    }

    return redirect('login'); // Redirige a la página de inicio o a la página de acceso denegado si el usuario no tiene el rol necesario.
}

}
