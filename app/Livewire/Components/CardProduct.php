<?php

namespace App\Livewire\Components;

use App\Models\Category;
use Livewire\Component;
use Livewire\Attributes\On;

class CardProduct extends Component
{
    /**
     * @var string
     */
    public string $slug;

    /**
     * @var string|null
     */
    public ?string $image;

    /**
     * @var string
     */
    public string $name;

    /**
     * @var Category|null
     */
    public ?Category $category;

    /**
     * @var int|null
     */
    public ?int $availableColors;

    /**
     * @var float
     */
    public float $price;

    public function render()
    {
        return view('livewire.components.card-product');
    }
}
