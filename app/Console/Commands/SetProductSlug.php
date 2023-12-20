<?php

namespace App\Console\Commands;

use App\Models\Product;
use Illuminate\Console\Command;
use Illuminate\Support\Str;

class SetProductSlug extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'gearxpro:set-product-slug';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'This command set all slugs of each product';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $langs = config('gearxpro.languages');

        foreach (Product::all() as $product) {
            $slug = [];
            foreach ($langs as $iso => $dataLang) {
                $slug[$iso] = Str::kebab($product->getTranslation('name', $iso));
            }
            $product->slug = $slug;
            $product->save();
        }
    }
}
