<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class IsOwner
{
    public function handle($request, Closure $next)
    {
        if (Auth::check() && Auth::user()->role !== 'owner') {
            return redirect('/')->with('error', 'Unauthorized access.');
        }

        return $next($request);
    }
}
