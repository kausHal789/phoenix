<?php

namespace App\Http\Middleware;

use Closure;

class Admin
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
        if ($user = $request->user()) {
            if ($user->role->id === 1 && $user->role->name === "Administrator") {
                return $next($request);
            }
        } else {
            return redirect('/login');
        }
        // Change according to your home page whatever it is
        return redirect('/home/admin');
    }
}
