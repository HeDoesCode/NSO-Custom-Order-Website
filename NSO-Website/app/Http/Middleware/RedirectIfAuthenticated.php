<?php

namespace App\Http\Middleware;

use App\Providers\RouteServiceProvider;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, string ...$guards): Response
    {
        $guards = empty($guards) ? [null] : $guards;

        foreach ($guards as $guard) {
            if ($guard == "admin" && Auth::guard($guard)->check()) {
                \Log::info("Admin guard is checked and user is authenticated.");
                return redirect(RouteServiceProvider::ADMIN_DASHBOARD);
            }
            
            if ($guard == "web" && Auth::guard($guard)->check()) {
                \Log::info("Regular guard is checked and user is authenticated.");
                return redirect(RouteServiceProvider::HOME);
            }
            
        }

        return $next($request);
    }
}
