<?php

namespace App\Livewire\Dashboard\Cards;

use App\Models\Product;
use App\Models\Supply;
use App\Models\User;
use Livewire\Component;

class Stocks extends Component
{
    public function placeholder()
    {
        return <<<'HTML'
        <div class="bg-gray-200 h-[294px] animate-pulse"></div>
        HTML;
    }

    public function render()
    {
        if (auth()->user()->hasRole(User::SUPERADMIN)) {
            $items = Product::count();
        } else if (auth()->user()->hasRole(User::RESELLER)) {
            $items = auth()->user()->stocks->count();
        }
        return view('livewire.dashboard.cards.stocks', [
            'items' => $items
        ]);
    }
}
