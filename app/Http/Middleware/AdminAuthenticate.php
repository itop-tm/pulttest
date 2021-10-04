<?php

namespace App\Http\Middleware;

use Closure;

class AdminAuthenticate
{
    public function handle($request, Closure $next)
    {
        $user = $request->user();

        abort_unless($user && $user->isAdmin(), 401, 'unauthorized action');

        return $next($request);
    }
}
