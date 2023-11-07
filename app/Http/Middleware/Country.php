<?php

namespace App\Http\Middleware;

use App\Models\User;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\URL;
use Symfony\Component\HttpFoundation\Response;

class Country
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $available_countries = User::role(User::RESELLER)->with('country')->get()->pluck('country.iso2_code');
        $available_countries = array_map('strtolower', $available_countries->toArray());

        if (!session('country_code') || !in_array($request->country_code, $available_countries)) {
            return redirect()->route('splash');
        }

        URL::defaults(['country_code' => session('country_code', 'it')]);

        return $next($request);
    }
}
