<?php

namespace App\Observers;

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
            (new StripeClient($user->country->reseller->stripe_private_key))
                ->customers->update(
                    $user->stripe_customer_id,
                    [
                        'name' => $user->fullName
                    ]
                )
            ;
        }
    }
}
