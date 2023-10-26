<?php

namespace Database\Seeders;

use App\Models\Product;
use App\Models\ProductVariant;
use App\Models\Supply;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class SupplySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $supply = Supply::create([
            'uuid' => Str::random(10),
            'user_id' => User::role(User::RESELLER)->first()->id,
            'amount' => '1936.27',
            'status' => fake()->randomElement(array_keys(Supply::STATUSES))
        ]);

        $product_ids = Product::all()->pluck('id');
        $variants = ProductVariant::with('product')
            ->whereIn('product_id', $product_ids);
        foreach (range(1, 10) as $o) {
            $variant = $variants->inRandomOrder()->first();
            $supply->rows()->create([
                'product' => $variant,
                'price' => $variant->product->countries()->where('iso2_code', 'it')->first()->prices->wholesale_price,
                'quantity' => fake()->randomDigit(),
            ]);
        }
    }
}
