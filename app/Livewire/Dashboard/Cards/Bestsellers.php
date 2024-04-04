<?php

namespace App\Livewire\Dashboard\Cards;

use App\Models\Order;
use App\Models\Product;
use App\Models\ProductVariant;
use App\Models\User;
use Livewire\Component;

class Bestsellers extends Component
{
    public function placeholder()
    {
        return <<<'HTML'
        <div class="bg-gray-200 h-[468px] animate-pulse"></div>
        HTML;
    }

    public function render()
    {
        $items = collect();
        $orders = collect();

        if(auth()->user()->hasRole(User::SUPERADMIN)) {
            $orders = Order::all();
        } elseif(auth()->user()->hasRole(User::RESELLER, User::AGENT)) {
            $orders = auth()->user()->resellerOrders;
        }

        $productQuantities = [];

        if ($orders) {
            foreach ($orders as $order) {
                foreach ($order->items as $item) {
                    $productId = $item->product_id;

                    if (!isset($productQuantities[$productId])) {
                        $productQuantities[$productId] = 0;
                    }

                    $productQuantities[$productId] += $item->quantity;
                }
            }
        }

        arsort($productQuantities);

        $mostSoldProductIds = array_keys($productQuantities);

        foreach ($mostSoldProductIds as $mostSoldProductId) {
            $items->push(ProductVariant::with('product')->where('product_id', $mostSoldProductId)->withTrashed()->first());
        }

        return view('livewire.dashboard.cards.bestsellers', [
            'items' => $items->take(5)
        ]);
    }
}
