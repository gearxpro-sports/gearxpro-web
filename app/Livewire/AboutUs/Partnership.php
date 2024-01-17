<?php

namespace App\Livewire\AboutUs;

use Livewire\Attributes\Layout;
use Livewire\Component;

#[Layout('layouts.guest')]
class Partnership extends Component
{
    public $ambassadors = [
        [
            'firstname' => 'Daniel Sanyo',
            'lastname' => 'Gutierrez',
            'image' => 'sanyo_gutierrez.jpg',
            'url' => 'https://www.instagram.com/reel/C0jegnetozM/?igsh=MTU5M3E5Y2J4dHFhZw=='
        ],
        [
            'firstname' => 'Alex',
            'lastname' => 'Merlim',
            'image' => 'alex_merlim.jpg',
            'url' => 'https://www.instagram.com/p/ClRfUlSrrYC/?igsh=bG5tNzh6ZWN6OW80'
        ],
        [
            'firstname' => 'Lorenzo',
            'lastname' => 'Montipò',
            'image' => 'lorenzo_montipò.jpg',
            'url' => 'https://www.instagram.com/p/Cn7K6esoY93/?igsh=MXUwMnl3MHNzY2dsbQ=='
        ],
        [
            'firstname' => 'Janice',
            'lastname' => 'Silva',
            'image' => 'janice_silva.jpg',
            'url' => 'https://www.instagram.com/p/ClRfG01rJZN/?igsh=a3p5bXo3cmZ0Y2R6'
        ],
        [
            'firstname' => 'Sofia',
            'lastname' => 'Fifò',
            'image' => 'sofia_fifò.jpg',
            'url' => 'https://www.instagram.com/p/ClRfnpyr53u/?igsh=MW5wcHl2dXJhZjFkMA=='
        ],
    ];
    public $partnerships = [
        [
            'title' => 'Torino Football Club',
            'image' => 'torino-logo.png',
            'url' => 'https://tv.torinofc.it/video/gearxpro-official-supplier-torino-fc-05-04-2023-1371'
        ],
        [
            'title' => 'Frosinone Calcio',
            'image' => 'frosinone-logo.png',
            'url' => 'https://www.frosinonecalcio.com/gearxpro-e-official-partner-del-frosinone-calcio/'
        ],
        [
            'title' => 'Ascoli Calcio 1898 FC',
            'image' => 'ascoli-logo.png',
            'url' => 'https://www.ascolicalcio1898.it/gearxpro-official-partner-dellascoli-calcio-anche-per-la-s-s-2023-24/'
        ],
        [
            'title' => 'Empoli FC',
            'image' => 'empoli-logo.png',
            'url' => 'https://empolifc.com/gearxpro-official-supplier-dellempoli-football-club/'
        ],
        [
            'title' => 'Fortitudo Bologna 103',
            'image' => 'fortitudo-logo.png',
            'url' => 'https://www.fortitudo103.it/gearxpro-e-il-nuovo-official-supplier-della-fortitudo-pallacanestro/'
        ],
        [
            'title' => 'Italia Socca',
            'image' => 'italia_socca-logo.png',
            'url' => 'https://www.teleacras.it/2023/05/24/socca-si-avvicinano-i-mondiali-per-gli-azzurri-anche-uno-sponsor-tecnico-oggi-al-vg-il-video-di-presentazione-della-vetrina-mondialedi-calcio-a-sei/?amp'
        ],
        [
            'title' => 'Pescara Calcio 1936',
            'image' => 'pescara-logo.png',
            'url' => 'https://www.pescaracalcio.com/gearxpro-official-supplier-pescara-calcio/'
        ],
        [
            'title' => 'Zebre Parma',
            'image' => 'zebre_parma-logo.png',
            'url' => 'https://www.zebreparma.it/it-it/gearxpro-e-fornitore-ufficiale-delle-zebre.aspx'
        ],
    ];

    public function render()
    {
        return view('livewire.about-us.partnership');
    }
}
