<?php

namespace App\Livewire\Shop\Section;

use App\Models\Category;
use Livewire\Component;

class CarouselTop extends Component
{

    public function render()
    {
        $categories = Category::where('parent_id', null)->get();

        return view('livewire.shop.section.carousel-top', [
            'categories' => $categories
        ]);
    }
}
