<?php

namespace Database\Seeders;

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
        $reseller = User::where('email', 'reseller@example.test')->first();
        $productVariants = ProductVariant::pluck('id');
        $stocks = [];

        for ($i=0; $i<20; $i++) {
            $variantId = $productVariants->random();
            
            if (isset($stocks[$variantId])) {
                continue;
            }

            $stocks[$variantId] = [
                'user_id' => $reseller->id,
                'product_variant_id' => $variantId,
                'quantity' => rand(0, 500),
                'created_at' => now(),
                'updated_at' => now(),
            ];
        }

        Stock::insert($stocks);
    }
}
