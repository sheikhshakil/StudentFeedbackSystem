<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class isUnauthenticated
{
    public function handle(Request $request, Closure $next)
    {
        $user = $request->session()->get("user");;
        if($user) {
            if($user["accType"] === "admin") {
                return redirect('/admin-dashboard');
            }
            else {
                return redirect('/dashboard');
            }
        }
        else {
            return $next($request);
        }
    }
}
