<?php

namespace App\Livewire\Dashboard\Cards;

use App\Models\Supply;
use App\Models\User;
use Livewire\Component;

class NewOrders extends Component
{
    public function placeholder()
    {
        return <<<'HTML'
        <div class="bg-gray-200 h-[468px] animate-pulse"></div>
        HTML;
    }

    public function render()
    {
        if (auth()->user()->hasRole(User::SUPERADMIN)) {
            $new_orders_count = Supply::where('status', 'new')->count();
        } else if (auth()->user()->hasRole(User::RESELLER)) {
            $new_orders_count = 14; // TODO: Inserire numero corretto da query Orders
        }
        $items = auth()->user()->stocks()->with('productVariant')->get()->take(5);
        return view('livewire.dashboard.cards.new-orders', [
            'new_orders_count' => $new_orders_count,
            'items' => $items
        ]);
    }
}
