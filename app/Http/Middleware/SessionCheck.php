<?php

namespace App\Http\Middleware;

use Closure;

class SessionCheck
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, $role = null)
    {
        if (!$request->session()->has('user') || $request->session()->get('role') !== $role)
            return redirect('view.login', $role);

        return $next($request);
    }
}
