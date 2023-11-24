<?php

namespace App\Livewire\AboutUs;

use Livewire\Attributes\Layout;
use Livewire\Component;

#[Layout('layouts.checkout')]
class Values extends Component
{
    public $slides = [];

    public function mount() {
        $this->slides = [
            [
                'image' => 'bg-about_us_11_mb xl:bg-about_us_11',
                'title' => 'uni que ness',
                'text' => 'We value our diverse workforce.
                Convinced that uniqueness is a strength,
                we strive to maintaining a working climate
                that promotes the growth and well-being
                of our employees by stimulating
                boldness and creativity.'
            ],
            [
                'image' => 'bg-about_us_12_mb xl:bg-about_us_12',
                'title' => 'int egr ity',
                'text' => 'We operate in an honestly and transparently
                by providing our customers with clear
                and accurate communication about our
                products and manufacturing activities.'
            ],
            [
                'image' => 'bg-about_us_13_mb xl:bg-about_us_13',
                'title' => 'envi ron ment',
                'text' => 'We are staunch allies of environment a sustainability,
                in line with the goals the 2030 Agenda promoted
                by the UN.
                We promote sustainable production models that
                adopt the best possible practices for Waste reduction
                and respect for the environment.'
            ],
            [
                'image' => 'bg-about_us_14_mb xl:bg-about_us_14',
                'title' => 're spe ct',
                'text' => 'We approach the market with
                absolute loyalty, taking into
                account our corporate philosophy
                which is based on respect for others,
                from colleagues to stakeholders.'
            ]
        ];
    }


    public function render()
    {
        return view('livewire.about-us.values');
    }
}
