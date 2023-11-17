<?php

namespace App\Livewire\Components;

use App\Models\Category;
use App\Models\Product;
use Livewire\Component;
use Livewire\Attributes\On;

class CardProduct extends Component
{
    /**
     * @var Product|null
     */
    public ?Product $product;

    /**
     * @var string|null
     */
    public ?string $image;

    /**
     * @var array
     */
    public array $availableColors = [];

    public function render()
    {
        return view('livewire.components.card-product');
    }
}
