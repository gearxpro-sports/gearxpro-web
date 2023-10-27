<?php

namespace Database\Seeders;

use App\Models\Product;
use App\Models\User;
use App\Models\Stock;
use App\Models\ProductVariant;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class StockSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $reseller = User::role(User::RESELLER)->first();
        $variants = ProductVariant::with('product')->get()->take(20);
        $stocks = [];

        foreach ($variants as $variant) {
            if (isset($stocks[$variant->id])) {
                continue;
            }

            $stocks[$variant->id] = [
                'user_id' => $reseller->id,
                'product_id' => $variant->product->id,
                'product_variant_id' => $variant->id,
                'quantity' => rand(0, 500)
            ];
        }

        Stock::insert($stocks);
    }
}
