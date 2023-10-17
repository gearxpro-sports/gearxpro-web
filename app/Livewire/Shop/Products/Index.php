<?php

namespace App\Livewire\Shop\Products;

use App\Livewire\Components\SectionButton;
use Livewire\Component;
use Livewire\Attributes\On;

class Index extends Component
{
    public $selectedCategory;
    public $selectedOrder = 0;

    public $orders = [
        'I piu popolari',
        'per categoria'
    ];

    public $categories = [
        'SoxPro',
        'Flex-GXPro',
        'LaceXPro',
        'TubeXPro',
        'Recovery'
    ];

    #[On('selectCategory')]
    public function selectCategory($index) {
        $this->selectedCategory = $index;
        $this->dispatch('setCategory', $index)->to(SectionButton::class);
    }

    #[On('selectOrder')]
    public function selectOrder($index) {
        $this->selectedOrder = $index;
    }

    public function render()
    {
        return view('livewire.shop.products.index')->layout('layouts.guest');
    }
}
