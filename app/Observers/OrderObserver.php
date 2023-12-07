<?php

namespace App\Observers;

use App\Models\Order;
use Stripe\StripeClient;

class OrderObserver
{
    /**
     * Handle the Order "created" event.
     */
    public function created(Order $order): void
    {
        (new StripeClient($order->reseller->stripe_private_key))
            ->paymentIntents->update($order->stripe_payment_intent_id, [
                'metadata' => [
                    'Order ID'        => $order->id,
                    'Order Reference' => $order->reference,
                ]
            ])
        ;
    }
}
