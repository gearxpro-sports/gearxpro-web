<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Product;
use Illuminate\Support\Str;
use App\Models\Attribute;
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
        $groupAttributes = Attribute::with('terms')->get();
        $countriesAvailable = User::role(User::RESELLER)->pluck('country_id');


        foreach (range(1, 5) as $n) {
            $name = 'Prodotto Test '.Str::random(3);
            $product = Product::create([
                'name' => $name,
                'main_desc' => fake()->paragraphs(2, true),
                'features_desc' => fake()->paragraphs(2, true),
                'pros_desc' => fake()->paragraphs(2, true),
                'technical_desc' => fake()->paragraphs(2, true),
                'washing_desc' => fake()->paragraphs(2, true),
                'slug' => Str::kebab($name),
                'active' => 1,
            ]);

            foreach (range(1, 5) as $nn) {
                $variant = $product->variants()->create([
                    'position' => $nn,
                    'sku' => 'SKU_'.$product->id.'_'.Str::random(3),
                    'barcode' => fake()->ean13(),
                    'quantity' => rand(0, 500),
                ]);

                foreach ($groupAttributes as $attribute) {
                    $variant->attributes()->attach($attribute->id, ['term_id' => $attribute->terms->shuffle()->first()->id]);
                }
            }

            foreach ($countriesAvailable as $countryId) {
                $product->countries()->attach([
                    $countryId => [
                        'wholesale_price' => rand(10, 40) / 10,
                        'price' => rand(41, 60) / 10,
                    ]
                ]);
            }
        }
    }
}
