<?php

namespace App\Http\Middleware;

use App\Models\User;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class setDefaultLangInDashboard
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if($request->user()->hasRole(User::SUPERADMIN)) {
            app()->setLocale(config('app.locale_be'));
        } else {
            app()->setLocale(session('language'));
        }

        return $next($request);
    }
}
