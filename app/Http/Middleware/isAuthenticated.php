<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class isAuthenticated
{
    public function handle(Request $request, Closure $next)
    {
        $user = $request->session()->get("user");
        if($user) {
            return $next($request);
        }
        else {
            return redirect('/login');
        }
    }
}
