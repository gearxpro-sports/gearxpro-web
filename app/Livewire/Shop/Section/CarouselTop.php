<?php

namespace App\Livewire\Shop\Section;
use Livewire\Component;

class CarouselTop extends Component
{
    public $categories = [
        [
            'id' => 9,
            'name' => 'SOXPro',
            'description' => 'Discovery GRIP:IN technology now',
            'image' => 'soxpro_category.jpg',
        ],
        [
            'id' => 0,
            'name' => 'Recovery',
            'description' => 'Get your energy back',
            'image' => 'recovery_category.jpg',
        ],
        [
            'id' => 1,
            'name' => 'FLEGXPro',
            'description' => 'Flexibility and protection for your performance',
            'image' => 'flegxpro_category.jpg',
        ],
        [
            'id' => 17,
            'name' => 'LACEX Pro',
            'description' => 'Lace up your game',
            'image' => 'lacexpro_category.jpg',
        ],
        [
            'id' => 25,
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
