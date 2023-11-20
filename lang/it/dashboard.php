<?php

return [
    'title' => 'Dashboard',
    'cards' => [
        'stocks' => [
            'title' => 'N. Prodotti in Magazzino',
            'total_available' => 'Totale Disponibili',
            'cta' => 'Visualizza'
        ],
        'orders' => [
            'title' => 'N. Ordini',
            'cta' => 'Visualizza Dettagli',
        ],
        'bestsellers' => [
            'title' => 'Prodotti più Venduti',
            'cta' => 'Vedi tutti',
            'table' => [
                'cols' => [
                    'position' => 'Classifica',
                    'id' => 'ID',
                    'image' => 'Foto Prodotto',
                    'name' => 'Nome Prodotto',
                    'price' => 'Prezzo',
                ],
            ]
        ],
        'new-orders' => [
            'title' => 'Nuovi Ordini',
            'cta' => 'Vedi tutti',
            'table' => [
                'cols' => [
                    'number' => 'Numero Ordine',
                    'date' => 'Data Ordine',
                    'customer' => 'Nome Cliente',
                    'price' => 'Prezzo',
                ],
            ]
        ],
        'sales' => [
            'main_title' => 'Vendite Mese',
            'title' => 'Totale delle vendite',
        ],
    ]
];
