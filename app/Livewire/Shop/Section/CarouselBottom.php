<?php

namespace App\Livewire\Shop\Section;

use App\Models\Country;
use App\Models\Product;
use App\Models\ProductVariant;
use App\Models\Stock;
use App\Models\User;
use Illuminate\Database\Eloquent\Builder;
use Livewire\Component;

class CarouselBottom extends Component
{
    public $reseller;
    public $orders;

    public function mount() {
        $this->reseller = User::find(session('reseller_id'));
        $this->orders = $this->reseller->resellerOrders ?? [];
    }


    public function render()
    {
        // TODO: Bestseller => decommentare righe
//        $products = collect();
//        $productQuantities = [];
//
//        foreach ($this->orders as $order) {
//            foreach ($order->items as $item) {
//                $productId = $item->product_id;
//
//                if (!isset($productQuantities[$productId])) {
//                    $productQuantities[$productId] = 0;
//                }
//
//                $productQuantities[$productId] += $item->quantity;
//            }
//        }
//
//        arsort($productQuantities);
//
//        $mostSoldProductIds = array_keys($productQuantities);
//
//        foreach ($mostSoldProductIds as $mostSoldProductId) {
//            $products->push(Product::with('variants')->where('id', $mostSoldProductId)->withTrashed()->first());
//        }
//
//        $products = $products->take(5);
//
        $productColors = [];

        $currentCountry = Country::with('reseller')->where('iso2_code', session('country_code'))->first();
        $products = Product::with('variants')
            ->withTrashed()
            ->whereHas('countries', function(Builder $query) use ($currentCountry) {
                $query
                    ->where('country_id', $currentCountry->id)
                    ->where(function(Builder $query) {
                        $query
//                            ->whereNotNull('wholesale_price')
                            ->whereNotNull('price')
                        ;
                    })
                ;
            })
            ->take(20)
            ->get(); // TODO: Bestseller => eliminare righe

        foreach ($products as $product) {
            $stocks = Stock::with('productVariant')
                ->where('user_id', session('reseller_id'))
                ->whereIn('product_variant_id', $product->variants->pluck('id'))
                ->where('quantity', '>', 0)
                ->get()
            ;


            if ($stocks->count() > 0) {
                foreach ($stocks as $stock) {
                    $productColors[$stock->product_id][] = $stock->productVariant->color?->color;
                }
                $productColors[$stock->product_id] = array_unique($productColors[$stock->product_id]);
            }
        }

        return view('livewire.shop.section.carousel-bottom', [
            'products' => $products,
            'productColors' => $productColors
        ]);
    }
}
