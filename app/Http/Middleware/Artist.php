<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class Artist
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
            if ($user->role->id === 2 && $user->role->name === "Artist") {
                return $next($request);
            }
        } else {
            return redirect('/login');
        }
        return redirect('/');
    }
}
