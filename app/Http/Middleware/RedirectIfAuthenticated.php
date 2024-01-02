<?php

namespace App\Http\Middleware;

use App\Providers\RouteServiceProvider;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;


// use Closure;
// use Illuminate\Http\Request;
// use Illuminate\Support\Facades\Auth;
// use Illuminate\Http\Response;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\Route;
use Illuminate\Auth\Middleware\Authenticate as Middleware;

class RedirectIfAuthenticated
{
 
    // public function handle(Request $request, Closure $next, string ...$guards): Response
    // {
    //     $guards = empty($guards) ? [null] : $guards;

    //     foreach ($guards as $guard) {
    //         if (Auth::guard($guard)->check()) {
    //             return redirect(RouteServiceProvider::HOME);
    //         }
    //     }

    //     return $next($request);
    // }


    public function handle(Request $request, Closure $next, ...$guards)
    {
        $guards = empty($guards) ? [null] : $guards;

        foreach ($guards as $guard) {
            if (Auth::guard($guard)->check()) {
                // If the user is authenticated, redirect to the appropriate URL
                return $this->redirectTo($request);
            }
        }

        return $next($request);
    }
    protected function redirectTo($request): string
    {
        if ($request->expectsJson()) {
            return '';
        }

        $user = Auth::user();

        // Check if the user is an admin
        if ($user->is_admin == 1) {
            return RouteServiceProvider::ADMIN;
        }
        

        // If not an admin, redirect back to the intended URL or the default home URL
        return redirect()->intended(RouteServiceProvider::HOME)->getTargetUrl();
    }
}
