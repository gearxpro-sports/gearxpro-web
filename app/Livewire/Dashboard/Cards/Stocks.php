<?php

namespace App\Livewire\Dashboard\Cards;

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
        $items = auth()->user()->stocks->count();
        return view('livewire.dashboard.cards.stocks', [
            'items' => $items
        ]);
    }
}
