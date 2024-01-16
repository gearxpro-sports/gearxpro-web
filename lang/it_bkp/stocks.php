<?php

return [
    'title' => 'Magazzino',
    'index' => [
        'title' => 'Magazzino',
        'table' => [
            'title' => 'Prodotti Magazzino',
            'cols'  => [
                'product'    => 'Nome Prodotto',
                'sku'        => 'ID Prodotto',
                'measures'   => 'Unità di misura',
                'quantity'   => 'Quantità',
                'sale_price' => 'Prezzo Vendita',
            ],
        ],
        'filter' => [
            'select_registration_date' => 'Seleziona Data Registrazione',
        ],
    ],
    'modals' => [
        'edit-quantity' => [
            'title' => 'Modifica quantità in magazzino',
            'update' => 'Aggiorna'
        ],
    ]
];
