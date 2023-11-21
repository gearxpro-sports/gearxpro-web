<?php

namespace App\Livewire\AboutUs;

use App\Models\Country;
use App\Models\Product;
use Livewire\Attributes\Layout;
use Illuminate\Database\Eloquent\Builder;
use Livewire\Component;

#[Layout('layouts.guest')]
class Development extends Component
{
    public $products;
    public $lastProducts;
    public $currentCountry;
    public $productColors;


    public function mount() {
        $this->currentCountry = Country::with('reseller')->where('iso2_code', session('country_code'))->first();

        $this->loadProducts();
    }

    public function loadProducts()
    {
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
            ])
            ->whereHas('stocks', function(Builder $query) {
                $query
                    ->select('product_id')
                    ->where('user_id', $this->currentCountry->reseller->id)
                    ->havingRaw('SUM(quantity) > 0')
                    ->groupBy('product_id')
                ;
            })
            ->whereHas('countries', function(Builder $query) {
                $query
                    ->where('country_id', $this->currentCountry->id)
                    ->where(function(Builder $query) {
                        $query
                            ->whereNotNull('wholesale_price')
                            ->whereNotNull('price')
                        ;
                    })
                ;
            })
        ;

        $this->products = $products->get();

        foreach ($this->products as $product) {
            if ($product->variants->count() > 0) {
                foreach ($product->variants as $variant) {
                    $this->productColors[$product->id][] = $variant->color->color;
                }
                $this->productColors[$product->id] = array_unique($this->productColors[$product->id]);
            }
        }
    }


    public function render()
    {
        return view('livewire.about-us.development');
    }
}
