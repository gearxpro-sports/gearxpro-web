<?php

namespace App\Livewire\Shop\Products;

use Livewire\Component;
use Livewire\Attributes\Layout;
use Livewire\Attributes\On;



#[Layout('layouts.guest')]
class Show extends Component
{
    public $product;
    public $format = 'short';
    public $selectedColor;
    public $selectedSize;
    public $quantity = 1;
    public $selectedMoney = 0;
    public $cart;

    public $colors = [
        [
            'code' => 'black',
            'image-short' => 'resources/images/icons/SOXPro-mini-1.svg',
            'image-long' => 'resources/images/icons/SOXPro-mini-1-long.svg',
        ],
        [
            'code' => 'green',
            'image-short' => 'resources/images/icons/SOXPro-mini-1.svg',
            'image-long' => 'resources/images/icons/SOXPro-mini-1-long.svg',
        ],
        [
            'code' => 'blue',
            'image-short' => 'resources/images/icons/SOXPro-mini-1.svg',
            'image-long' => 'resources/images/icons/SOXPro-mini-1-long.svg',
        ],

    ];

    public $sizes = ['xs', 's', 'm', 'l', 'xl', 'xxl'];

    public function mount($product) {
        $this->product = $product;
    }

    public function changeFormat($type) {
        $this->format = $type;
    }

    public function selectColor($color) {
        $this->selectedColor = $color;
    }

    public function selectSize($size) {
        $this->selectedSize = $size;
    }

    #[On('selectMoney')]
    public function selectMoney($money) {
        $this->selectedMoney = $money;
    }

    public function addProduct()
    {
        $this->quantity++;
    }

    public function removeProduct()
    {
        if ($this->quantity > 1) {
            $this->quantity--;
        }
    }

    #[On('addToCart')]
    public function addToCart() {
        $this->cart[$this->product] = [
            'format' => $this->format,
            'color' => $this->selectedColor,
            'size' => $this->selectedSize,
            'quantity' => $this->quantity,
        ];
    }

    public function payForLink() {
        //TODO
    }

    public function render()
    {
        return view('livewire.shop.products.show');
    }
}
