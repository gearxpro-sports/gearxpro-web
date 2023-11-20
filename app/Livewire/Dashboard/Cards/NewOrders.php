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
            $orders_count = Supply::where('status', 'new')->count();
            $items = Supply::latest()->get()->take(5);
        } else if (auth()->user()->hasRole(User::RESELLER)) {
            $orders_count = auth()->user()->resellerOrders->count();
            $items = auth()->user()->resellerOrders()->latest()->get()->take(5);
        }
        return view('livewire.dashboard.cards.new-orders', [
            'orders_count' => $orders_count,
            'items' => $items
        ]);
    }
}
