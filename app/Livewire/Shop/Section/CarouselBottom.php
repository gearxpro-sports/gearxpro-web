<?php

namespace App\Livewire\Shop\Section;

use App\Models\Country;
use App\Models\Product;
use Illuminate\Database\Eloquent\Builder;
use Livewire\Component;

class CarouselBottom extends Component
{
    public $currentCountry;

    public function mount() {
        $this->currentCountry = Country::with('reseller')->where('iso2_code', session('country_code'))->first();
    }

    public function render()
    {
        $productColors = [];
        $products = Product::with([
            'categories' => function($query) {
                $query->whereNull('parent_id');
            },
            'variants' => function($query) {
                $query
                    ->without(['product', 'attributes'])
                    ->with(['media', 'terms' => function($query) {
                        $query->whereNotNUll('color');
                    }])
                ;
            },
        ])->whereHas('stocks', function(Builder $query) {
            $query
                ->select('product_id')
                ->where('user_id', $this->currentCountry->reseller->id)
                ->havingRaw('SUM(quantity) > 0')
                ->groupBy('product_id')
            ;
        })->whereHas('countries', function(Builder $query) {
            $query
                ->where('country_id', $this->currentCountry->id)
                ->where(function(Builder $query) {
                    $query
                        ->whereNotNull('wholesale_price')
                        ->whereNotNull('price')
                    ;
                })
            ;
        })->take(4)->get();

        foreach ($products as $product) {
            if ($product->variants->count() > 0) {
                foreach ($product->variants as $variant) {
                    $productColors[$product->id][] = $variant->color?->color;
                }
                $productColors[$product->id] = array_unique($productColors[$product->id]);
            }
        }

        return view('livewire.shop.section.carousel-bottom', [
            'products' => $products,
            'productColors' => $productColors
        ]);
    }
}
