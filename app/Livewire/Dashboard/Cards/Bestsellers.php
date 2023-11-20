<?php

namespace App\Livewire\Dashboard\Cards;

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
        $items = auth()->user()->stocks()->with('productVariant')->get()->take(5);
        return view('livewire.dashboard.cards.bestsellers', [
            'items' => $items
        ]);
    }
}
