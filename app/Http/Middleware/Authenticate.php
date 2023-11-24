<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class Authenticate extends Middleware
{
    public function handle($request, Closure $next, ...$guards)
    {
        if(auth()->check()) {
            $country_code = auth()->user()->country_code;
            session()->put('country_code', $country_code);
//            $reseller = \App\Models\Country::where('iso2_code', $country_code)->first()->reseller;
//            session()->put('reseller_id', $reseller->id);
        }

        return parent::handle($request, $next, $guards);
    }

    /**
     * Get the path the user should be redirected to when they are not authenticated.
     */
    protected function redirectTo(Request $request): ?string
    {
        return $request->expectsJson() ? null : route('login');
    }
}
