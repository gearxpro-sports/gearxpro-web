<?php

namespace App\Livewire\Dashboard\Cards;

use Livewire\Component;

class Orders extends Component
{
    public function placeholder()
    {
        return <<<'HTML'
        <div class="bg-gray-200 h-[294px] animate-pulse"></div>
        HTML;
    }

    public function render()
    {
        $labels = [5, 10, 15, 20, 25, 30];
        $values = [50, 100, 150, 200, 250];
        $datasets = [
            [
                'backgroundColor' => '#54b0cd',
                'borderColor' => '#54b0cd',
                'data' => [150, 200, 140, 100, 240, 220, 100, 220, 210, 0, 150, 220, 250],
                'tension' => 0.4
            ],
        ];
        return view('livewire.dashboard.cards.orders', [
            'labels' => $labels,
            'values' => $values,
            'datasets' => $datasets
        ]);
    }
}
