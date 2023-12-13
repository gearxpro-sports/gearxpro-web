<?php

namespace App\Livewire\Shop;

use App\Models\Country;
use App\Models\User;
use App\Services\IpApiService;
use Livewire\Attributes\Layout;
use Livewire\Component;

class Splash extends Component
{
    #[Layout('layouts.blank')]

    public function mount() {

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
            session()->put('reseller_id', $country->reseller_id);
            session()->put('country_code', strtolower($country->reseller->country_code));
            session()->put('user_ip', $ip);
        }

        return redirect()->route('home', ['country_code' => session('country_code')]);
    }

    public function setCountry($iso) {
        session()->put('country_code', strtolower($iso));
        $reseller = Country::where('iso2_code', $iso)->first()->reseller;
        session()->put('reseller_id', $reseller->id);

        return redirect()->route('home', ['country_code' => session('country_code')]);
    }

    public function render()
    {
        $resellers = User::role(User::RESELLER)->with('country')->get()->groupBy('country_id');

        return view('livewire.shop.splash', [
            'resellers' => $resellers
        ]);
    }
}
