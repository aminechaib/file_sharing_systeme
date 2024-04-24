<?php
namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class EnsureUserIsAdmin
{
    /**
     * Handle an incoming request.
     *
     * Determine if the current user is an admin.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if (auth()->check() && auth()->user()->role === 'admin') {
            return $next($request);
        }

        return redirect('home')->with('error', 'You are not authorized to access this area.');
    }
}
