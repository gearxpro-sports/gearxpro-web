<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Product;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use App\Models\Attribute;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ProductSeeder extends Seeder
{
    /**
     * @var Collection
     */
    private Collection $countriesAvailable;

    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $this->countriesAvailable = User::role(User::RESELLER)->pluck('country_id');
        $this->cleanStorageMediaDirectory();
        $this->createCompleteProduct();
        $this->createRandomProducts();
    }

    private function cleanStorageMediaDirectory()
    {
        File::cleanDirectory(Storage::disk('local')->path('public'));
        File::put('storage/app/public/.gitignore', implode(PHP_EOL, ['*', '!.gitignore', '']));;
    }

    private function createCompleteProduct()
    {
        $name = 'Prodotto test con varianti';
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

        // SOXPRO
        $product->categories()->attach(9);

        $attributes_variants = [
            // CORTO - NERO - S
            1 => [
                'terms' => [[1, ['term_id' => 1]], [2, ['term_id' => 11]], [3, ['term_id' => 14]]],
                'image' => 1,
            ],
            // CORTO - NERO - M
            2 => [
                'terms' => [[1, ['term_id' => 1]], [2, ['term_id' => 11]], [3, ['term_id' => 15]]],
                'image' => 1,
            ],
            // CORTO - NERO - L
            3 => [
                'terms' => [[1, ['term_id' => 1]], [2, ['term_id' => 11]], [3, ['term_id' => 16]]],
                'image' => 1,
            ],
            // CORTO - NERO - XL
            4 => [
                'terms' => [[1, ['term_id' => 1]], [2, ['term_id' => 11]], [3, ['term_id' => 17]]],
                'image' => 1,
            ],
            // LUNGO - BLU - S
            5 => [
                'terms' => [[1, ['term_id' => 2]], [2, ['term_id' => 5]], [3, ['term_id' => 14]]],
                'image' => 9,
            ],
            // LUNGO - BLU - M
            6 => [
                'terms' => [[1, ['term_id' => 2]], [2, ['term_id' => 5]], [3, ['term_id' => 15]]],
                'image' => 9,
            ],
            // LUNGO - BLU - L
            7 => [
                'terms' => [[1, ['term_id' => 2]], [2, ['term_id' => 5]], [3, ['term_id' => 16]]],
                'image' => 9,
            ],
            // LUNGO - BLU - XL
            8 => [
                'terms' => [[1, ['term_id' => 2]], [2, ['term_id' => 5]], [3, ['term_id' => 17]]],
                'image' => 9,
            ],
            // LUNGO - MARRONE - S
            9 => [
                'terms' => [[1, ['term_id' => 2]], [2, ['term_id' => 9]], [3, ['term_id' => 14]]],
                'image' => 8,
            ],
            // LUNGO - MARRONE - M
            10 => [
                'terms' => [[1, ['term_id' => 2]], [2, ['term_id' => 9]], [3, ['term_id' => 15]]],
                'image' => 8,
            ],
            // LUNGO - MARRONE - L
            11 => [
                'terms' => [[1, ['term_id' => 2]], [2, ['term_id' => 9]], [3, ['term_id' => 16]]],
                'image' => 8,
            ],
            // LUNGO - MARRONE - XL
            12 => [
                'terms' => [[1, ['term_id' => 2]], [2, ['term_id' => 9]], [3, ['term_id' => 17]]],
                'image' => 8,
            ],
            // CORTO - VERDE - S
            13 => [
                'terms' => [[1, ['term_id' => 1]], [2, ['term_id' => 4]], [3, ['term_id' => 14]]],
                'image' => 5,
            ],
            // CORTO - VERDE - M
            14 => [
                'terms' => [[1, ['term_id' => 1]], [2, ['term_id' => 4]], [3, ['term_id' => 15]]],
                'image' => 5,
            ],
            // CORTO - VERDE - L
            15 => [
                'terms' => [[1, ['term_id' => 1]], [2, ['term_id' => 4]], [3, ['term_id' => 16]]],
                'image' => 5,
            ],
            // CORTO - VERDE - XL
            16 => [
                'terms' => [[1, ['term_id' => 1]], [2, ['term_id' => 4]], [3, ['term_id' => 17]]],
                'image' => 5,
            ],
            // LUNGO - GIALLO - S
            17 => [
                'terms' => [[1, ['term_id' => 2]], [2, ['term_id' => 6]], [3, ['term_id' => 14]]],
                'image' => 10,
            ],
            // LUNGO - GIALLO - M
            18 => [
                'terms' => [[1, ['term_id' => 2]], [2, ['term_id' => 6]], [3, ['term_id' => 15]]],
                'image' => 10,
            ],
            // LUNGO - GIALLO - L
            19 => [
                'terms' => [[1, ['term_id' => 2]], [2, ['term_id' => 6]], [3, ['term_id' => 16]]],
                'image' => 10,
            ],
            // LUNGO - GIALLO - XL
            20 => [
                'terms' => [[1, ['term_id' => 2]], [2, ['term_id' => 6]], [3, ['term_id' => 17]]],
                'image' => 10,
            ],
            // CORTO - BIANCO - S
            21 => [
                'terms' => [[1, ['term_id' => 1]], [2, ['term_id' => 12]], [3, ['term_id' => 14]]],
                'image' => 2,
            ],
            // CORTO - BIANCO - M
            22 => [
                'terms' => [[1, ['term_id' => 1]], [2, ['term_id' => 12]], [3, ['term_id' => 15]]],
                'image' => 2,
            ],
            // CORTO - BIANCO - L
            23 => [
                'terms' => [[1, ['term_id' => 1]], [2, ['term_id' => 12]], [3, ['term_id' => 16]]],
                'image' => 2,
            ],
            // CORTO - BIANCO - XL
            24 => [
                'terms' => [[1, ['term_id' => 1]], [2, ['term_id' => 12]], [3, ['term_id' => 17]]],
                'image' => 2,
            ],
        ];

        foreach (range(1, 24) as $nn) {
            $variant = $product->variants()->create([
                'position' => $nn,
                'sku' => 'SKUTEST_00'.$nn,
                'barcode' => fake()->ean13(),
                'quantity' => rand(0, 500),
            ]);
            foreach ($attributes_variants[$variant->id]['terms'] as $termData) {
                $variant->attributes()->attach($termData[0], $termData[1]);
            }
            $variant->addMedia(__DIR__ .'/product-images/'.$attributes_variants[$variant->id]['image'].'.png')->preservingOriginal()->toMediaCollection('products');
        }

        foreach ($this->countriesAvailable as $countryId) {
            $product->countries()->attach([
                $countryId => [
                    'wholesale_price' => rand(10, 40) / 10,
                    'price' => rand(41, 60) / 10,
                ]
            ]);
        }
    }

    private function createRandomProducts()
    {
        $groupAttributes = Attribute::with('terms')->get();
        $images = array_diff(scandir(__DIR__ .'/product-images'), ['.', '..']);
        $categories = [1,9,17,25];

        foreach (range(1, 5) as $n) {
            $name = 'Prodotto Test '.Str::random(6);
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

            $product->categories()->attach($categories[array_rand($categories)]);

            foreach (range(1, 5) as $nn) {
                $variant = $product->variants()->create([
                    'position' => $nn,
                    'sku' => 'SKU_'.$product->id.'_'.Str::random(6),
                    'barcode' => fake()->ean13(),
                    'quantity' => rand(0, 500),
                ]);

                foreach ($groupAttributes as $attribute) {
                    $variant->attributes()->attach($attribute->id, ['term_id' => $attribute->terms->shuffle()->first()->id]);
                }

                $variant->addMedia(__DIR__ .'/product-images/'.$images[array_rand($images)])->preservingOriginal()->toMediaCollection('products');
            }

            foreach ($this->countriesAvailable as $countryId) {
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
