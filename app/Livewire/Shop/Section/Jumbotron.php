<?php

namespace App\Livewire\Shop\Section;

use Livewire\Component;

class Jumbotron extends Component
{
    public $slides = [
        'slide_jumbotron1.jpg',
        'slide_jumbotron2.jpg',
        'slide_jumbotron3.jpg',
    ];

    public function render()
    {
        return view('livewire.shop.section.jumbotron');
    }
}
