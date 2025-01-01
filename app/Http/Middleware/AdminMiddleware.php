<?php
namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminMiddleware
{
    public function handle($request, Closure $next)
{
    if (auth()->check() && auth()->user()->role_id == 1) { // Assuming role_id 1 is for admin
        return $next($request);
    }

    return redirect('/home')->with('error', 'You do not have access to this page.');
}
}