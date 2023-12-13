<?php

namespace App\Http\Middleware;

use App\Models\User;
use App\Services\IpApiService;
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
//        $ip = '101.46.224.0';
//        $ip = '79.24.239.62';
        $ip = '140.93.0.0';
//       $ip = $request->getClientIp();

        if (session('user_ip') !== $ip) {
            $countryCode = (new IpApiService($ip))->getIpInfo('countryCode');
            if (!$countryCode) {
                $countryCode = config('app.country');
            }
            $country = \App\Models\Country::where('iso2_code', strtolower($countryCode))->first();
            if (!$country->reseller_id) {
                $defaultReseller = \App\Models\Country::where('iso2_code', config('app.country'))->first()->reseller;
                session()->put('reseller_id', $defaultReseller->id);
                session()->put('country_code', $defaultReseller->country_code);
            } else {
                session()->put('reseller_id', $country->reseller_id);
                session()->put('country_code', strtolower($country->reseller->country_code));
            }

//            dd(session('country_code'), session('reseller_id'));

            session()->put('user_ip', $ip);
        }

        $available_countries = User::role(User::RESELLER)->with('country')->get()->pluck('country.iso2_code');
        $available_countries = array_map('strtolower', $available_countries->toArray());

        if(!in_array($request->country_code, $available_countries)) {
            if(auth()->check() && auth()->user()->hasRole(User::SUPERADMIN)) {
                session()->remove('country_code');
                session()->remove('reseller_id');
            }
        }

        if (!session('country_code') || !in_array($request->country_code, $available_countries)) {
            return redirect()->route('splash');
        }

        if(auth()->check() && auth()->user()->hasRole(User::RESELLER) && $request->country_code !== auth()->user()->country_code) {
            return redirect()->back();
        }

        if(auth()->check() && auth()->user()->hasRole(User::SUPERADMIN) && $request->country_code !== session('country_code')) {
            session()->put('country_code', $request->country_code);
            $reseller = \App\Models\Country::where('iso2_code', $request->country_code)->first()->reseller;
            session()->put('reseller_id', $reseller->id);
        }

        if(!auth()->check() && $request->country_code !== session('country_code')) {
            session()->put('country_code', session('country_code'));
            $reseller = \App\Models\Country::where('iso2_code', session('country_code'))->first()->reseller;
            session()->put('reseller_id', !$reseller ? session('reseller_id') : $reseller->id);

            return redirect()->route('home', ['country_code' => session('country_code')]);
        }

        if($available_countries) {
            URL::defaults(['country_code' => session('country_code', $available_countries[0])]);
        }

        return $next($request);
    }
}
