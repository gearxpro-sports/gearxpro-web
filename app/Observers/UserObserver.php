<?php

namespace App\Observers;

use App\Models\Country;
use App\Models\User;
use Stripe\StripeClient;

class UserObserver
{
    /**
     * Handle the User "updated" event.
     */
    public function updated(User $user): void
    {
        if ($user->hasRole(User::CUSTOMER) && $user->stripe_customer_id) {
            $reseller =
                Country::where('iso2_code', session('ip_country_code'))->first()->reseller ??
                User::role(User::RESELLER)->where('country_id', Country::where('iso2_code', session('ip_country_code'))->first()->id)->first()
            ;

            (new StripeClient($reseller->stripe_private_key))
                ->customers->update(
                    $user->stripe_customer_id, [
                        'name' => $user->fullName
                    ]
                )
            ;
        }
    }
}
