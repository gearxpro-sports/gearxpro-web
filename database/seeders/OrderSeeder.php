<?php

namespace Database\Seeders;

use App\Models\Order;
use App\Models\Product;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class OrderSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $countryId = 108;
        $customers = User::role(User::CUSTOMER)->where('country_id', $countryId)->get();
        $products = Product::all();
        $reseller = User::role(User::RESELLER)->where('country_id', $countryId)->first();
        $addressHiddenFields = ['id', 'user_id', 'country_id', 'type', 'default', 'created_at', 'updated_at'];


        for($i=0; $i<=10; $i++) {
            $customer = $customers->random();
            $orderItems = [];
            $total = 0;
            $numItems = rand(1,5);

            for($num=0; $num<=$numItems; $num++) {
                $product = $products->random();
                $variant = $product->variants()->inRandomOrder()->first();
                $price =  $product->countries()->where('id', $countryId)->first()->prices->price;
                $orderItems[] = [
                    'product_id' => $product->id,
                    'variant_id' => $variant->id,
                    'name'       => sprintf('%s : %s', $product->name, $variant->terms->map(fn($term) => $term->value)->join(' - ')),
                    'price'      => $price,
                    'quantity'   => rand(1,10),
                ];
                $total = $total + $price;
            }

            Order::create([
                'reference' => strtoupper(Str::random(10)),
                'user_id' => $customer->id,
                'reseller_id' => $reseller->id,
                'country_id' => $countryId,
                'status' => Order::PAID_STATUS,
                'payment_method' => Order::STRIPE_PAYMENT,
                'billing_address' => $customer->billing_address->makeHidden($addressHiddenFields)->attributesToArray(),
                'shipping_address' => $customer->billing_address->makeHidden([...$addressHiddenFields, ...[ 'sdi', 'pec']])->attributesToArray(),
                'items' => $orderItems,
                'shipping_cost' => config('app.shipping_cost'),
                'paid_at' => now(),
                'total' => $total,
            ]);
        }
    }
}
