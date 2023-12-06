<?php

namespace App\Livewire\Shop\Section;

use App\Models\Product;
use App\Models\ProductVariant;
use App\Models\Stock;
use App\Models\User;
use Livewire\Component;

class CarouselBottom extends Component
{
    public $reseller;
    public $orders;

    public function mount() {
        $this->reseller = User::find(session('reseller_id'));
        $this->orders = $this->reseller->resellerOrders;
    }


    public function render()
    {
        $products = collect();
        $productQuantities = [];

        foreach ($this->orders as $order) {
            foreach ($order->items as $item) {
                $productId = $item->product_id;

                if (!isset($productQuantities[$productId])) {
                    $productQuantities[$productId] = 0;
                }

                $productQuantities[$productId] += $item->quantity;
            }
        }

        arsort($productQuantities);

        $mostSoldProductIds = array_keys($productQuantities);

        foreach ($mostSoldProductIds as $mostSoldProductId) {
            $products->push(Product::with('variants')->where('id', $mostSoldProductId)->withTrashed()->first());
        }

        $products = $products->take(5);

        $productColors = [];

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
