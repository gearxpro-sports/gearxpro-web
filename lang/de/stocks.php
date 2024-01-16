<?php

return [
    'title' => 'Lager',
    'index' => [
        'title' => 'Lager',
        'table' => [
            'title' => 'Lagerprodukte',
            'cols'  => [
                'product'    => 'Produktname',
                'sku'        => 'Produkt ID',
                'measures'   => 'Maßeinheit',
                'quantity'   => 'Menge',
                'sale_price' => 'Verkaufspreis',
            ],
        ],
        'filter' => [
            'select_registration_date' => 'Wählen Sie Registrierungsdatum',
        ],
    ],
    'modals' => [
        'edit-quantity' => [
            'title' => 'Menge im Lager bearbeiten',
            'update' => 'Aktualisieren'
        ],
    ]
];
