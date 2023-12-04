<?php

namespace App\Livewire\AboutUs;

use App\Models\Product;
use App\Models\Stock;
use App\Models\User;
use Livewire\Attributes\Layout;
use Livewire\Component;

#[Layout('layouts.guest')]
class Development extends Component
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

        $products = $products->random(5);

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

        return view('livewire.about-us.development', [
            'products' => $products,
            'productColors' => $productColors
        ]);
    }
}
