<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class SetResellerMissingDataMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (
            (
                !$request->user()->tax ||
                !$request->user()->stripe_public_key ||
                !$request->user()->stripe_public_key
            ) &&
            !$request->user()->hasRole(\App\Models\User::SUPERADMIN) &&
            !$request->routeIs('dashboard')
        ) {
            return redirect()->route('dashboard');
        }

        return $next($request);
    }
}
