<?php

namespace App\Livewire\Shop\Products;

use App\Livewire\Components\SectionButton;
use App\Models\Product;
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

    public $categoriesFilter = [
        'SOXPRO' => ['1', '2'],
        'FLEX-GXPRO' => ['1', '2'],
        'LACEXPRO' => ['1', '2'],
        'TUBEXPRO' => ['1', '2'],
        'RECOVERY' => ['1', '2'],
    ];

    public $colors = [
        [
            'color' => '#000000',
            'name' => 'black'
        ],
        [
            'color' => '#2459e8',
            'name' => 'blue'
        ],
        [
            'color' => '#ffffff',
            'name' => 'blanc'
        ],
        [
            'color' => '#f84b4b',
            'name' => 'red'
        ],
        [
            'color' => '#ff8b43',
            'name' => 'orange'
        ],
    ];

    public $sizes = ['xs', 's', 'm', 'l', 'xl', 'xxl'];

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
        $this->color = null;
        $this->size = null;
    }

    public function render()
    {
        $products = Product::all();

        return view('livewire.shop.products.index', [
            'products' => $products
        ]);
    }
}
