<?php

namespace App\Livewire\Shop\Section;

use Livewire\Component;

class CarouselTop extends Component
{
    public $categories = [
        [
            'name' => 'SOXPro',
            'description' => 'Discovery GRIP:IN technology now',
            'image' => 'soxpro_category.jpg',
        ],
        [
            'name' => 'Recovery',
            'description' => 'Get your energy back',
            'image' => 'recovery_category.jpg',
        ],
        [
            'name' => 'FLEGXPro',
            'description' => 'Flexibility and protection for your performance',
            'image' => 'flegxpro_category.jpg',
        ],
        [
            'name' => 'LACEX Pro',
            'description' => 'Lace up your game',
            'image' => 'lacexpro_category.jpg',
        ],
        [
            'name' => 'TUBEXPro',
            'description' => 'An indispensable product for every footballer',
            'image' => 'tubexpro_category.jpg',
        ],
    ];

    public function render()
    {
        return view('livewire.shop.section.carousel-top');
    }
}
