<?php

namespace App\Livewire\Shop\Products;

use App\Livewire\Components\SectionButton;
use Livewire\Component;
use Livewire\Attributes\Layout;
use Livewire\Attributes\On;

#[Layout('layouts.guest')]
class Index extends Component
{
    public $selectedCategory;
    public $selectedOrder = 0;
    public $filter = false;
    public $product;
    public $color;
    public $size;

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

    public $products = [
        0 => [
            'name' => 'SoXPro',
            'image' => 'SOXPro.png',
            'description' => 'SOXPro Trekking - Green',
            'availableColor' => '1',
            'price' => '29,00 - € 35,00'
        ],
        1 => [
            'name' => 'SoXPro',
            'image' => 'SOXPro.png',
            'description' => 'SOXPro Trekking - Green',
            'availableColor' => '1',
            'price' => '29,00 - € 35,00'
        ],
        2 => [
            'name' => 'SoXPro',
            'image' => 'SOXPro.png',
            'description' => 'SOXPro Trekking - Green',
            'availableColor' => '1',
            'price' => '29,00 - € 35,00'
        ],
        3 => [
            'name' => 'SoXPro',
            'image' => 'SOXPro.png',
            'description' => 'SOXPro Trekking - Green',
            'availableColor' => '1',
            'price' => '29,00 - € 35,00'
        ],
        4 => [
            'name' => 'SoXPro',
            'image' => 'SOXPro.png',
            'description' => 'SOXPro Trekking - Green',
            'availableColor' => '1',
            'price' => '29,00 - € 35,00'
        ],
        5 => [
            'name' => 'SoXPro',
            'image' => 'SOXPro.png',
            'description' => 'SOXPro Trekking - Green',
            'availableColor' => '1',
            'price' => '29,00 - € 35,00'
        ],
        6 => [
            'name' => 'SoXPro',
            'image' => 'SOXPro.png',
            'description' => 'SOXPro Trekking - Green',
            'availableColor' => '1',
            'price' => '29,00 - € 35,00'
        ],
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

    #[On('filterOn')]
    public function filterOn() {
        $this->filter = !$this->filter;
    }

    #[On('setFilter')]
    public function setFilter($type, $element) {
        $this->product = $element;
    }

    #[On('setColor')]
    public function setColor($color) {
        $this->color = $color;
    }

    #[On('setSize')]
    public function setSize($size) {
        $this->size = $size;
    }

    public function clearFilter() {
        $this->product = null;
        $this->color = null;
        $this->size = null;
    }

    public function render()
    {
        return view('livewire.shop.products.index');
    }
}
