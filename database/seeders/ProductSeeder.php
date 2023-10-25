<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Product;
use Illuminate\Support\Str;
use App\Models\GroupAttribute;
use App\Models\ProductVariant;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $groupAttributes = GroupAttribute::with('attributes')->get()->pluck('attributes', 'id');
        $groupedIds = [];
        foreach ($groupAttributes as $index => $group) {
            $groupedIds[$index] = array_column($group->toArray(), 'id');
        }

        $countriesAvailable = User::role(User::RESELLER)->pluck('country_id');
        
        for ($k=1; $k<8; $k++) {
            
            $product = Product::create([
                'name' => 'Prodotto Test '.$k,
                'main_desc' => fake()->paragraphs(2, true),
                'features_desc' => fake()->paragraphs(2, true),
                'pros_desc' => fake()->paragraphs(2, true),
                'technical_desc' => fake()->paragraphs(2, true),
                'washing_desc' => fake()->paragraphs(2, true),
                'slug' => Str::kebab('Prodotto di Test'),
                'has_variants' => true,
                'active' => 1,
            ]);
    
            $combinations = [];
            for ($i=0; $i<10; $i++) {
                $combinations[] = [
                    $groupedIds[1][array_rand($groupedIds[1])],
                    $groupedIds[2][array_rand($groupedIds[2])],
                    $groupedIds[3][array_rand($groupedIds[3])],
                ];
            }
    
            $combinations = array_unique($combinations, SORT_REGULAR);
            $position = 1;
            foreach ($combinations as $combination) {
                $productVariant = ProductVariant::create([
                    'product_id' => $product->id,
                    'position'   => $position,
                    'sku'        => 'SKU'.$k,
                    'barcode'    => '000000000'.$k,
                    'quantity'   => rand(0, 500),
                ]);
    
                $productVariant->attributes()->attach($combination);
                $position++;
            }

            foreach($countriesAvailable as $countryId) {
                $product->countries()->attach([
                    $countryId => [
                        'wholesale_price' => rand(10, 40) / 10,
                        'price'           => rand(41, 60) / 10,
                    ]
                ]);
            }
        }
    }
}
