<?php

namespace App\Http\Middleware;

use Closure;

class LoginMiddleware {

    public function handle($request, Closure $next) {
        if (!session('usuario'))
            return redirect('login');
        return $next($request);
    }
}
