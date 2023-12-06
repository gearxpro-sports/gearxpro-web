<?php

namespace App\Jobs\StripeWebhooks;

use App\Models\Cart;
use App\Models\Order;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Str;
use Spatie\WebhookClient\Models\WebhookCall;

class HandlePaymentIntentSucceeded implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     */
    public function __construct(public WebhookCall $webhookCall)
    {}

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        $eventObj = $this->webhookCall->payload['data']['object'];

        if ($cart = Cart::where('stripe_payment_intent_id',$eventObj['id'])->first()) {

            $customer = $cart->user;
            $addressHiddenFields = ['id', 'user_id', 'country_id', 'type', 'default', 'created_at', 'updated_at'];
            $country = $customer->country;

            $orderItems = [];
            foreach ($cart->items as $cartItem) {
                $orderItems[] = [
                    'product_id' => $cartItem->variant->product->id,
                    'variant_id' => $cartItem->product_variant_id,
                    'name'       => sprintf('%s : %s', $cartItem->variant->product->name, $cartItem->variant->terms->map(fn($term) => $term->value)->join(' - ')),
                    'price'      => $cartItem->price,
                    'quantity'   => $cartItem->quantity,
                ];
            }

            $order = Order::create([
                'reference'                => strtoupper(Str::random(10)),
                'user_id'                  => $customer->id,
                'reseller_id'              => $country->reseller->id,
                'country_id'               => $country->id,
                'status'                   => Order::PAID_STATUS,
                'payment_method'           => Order::STRIPE_PAYMENT,
                'billing_address'          => $customer->billing_address?->makeHidden($addressHiddenFields)->attributesToArray(),
                'shipping_address'         => $customer->shipping_address->makeHidden([...$addressHiddenFields, ...[ 'sdi', 'pec']])->attributesToArray(),
                'items'                    => $orderItems,
                'shipping_cost'            => config('app.shipping_cost'),
                'paid_at'                  => now(),
                'total'                    => $eventObj['amount'] / 100,
                'stripe_payment_intent_id' => $cart->stripe_payment_intent_id,
            ]);

            foreach($order->items as $item) {
                $country->reseller->stocks()->where('product_id', $item->product_id)->where('product_variant_id', $item->variant_id)->decrement('quantity', $item->quantity);
            }

            $cart->delete();
        }
    }
}
