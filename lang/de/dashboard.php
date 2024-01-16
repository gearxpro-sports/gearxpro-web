<?php

return [
    'title' => 'Dashboards',
    'cards' => [
        'stocks' => [
            'admin_title' => 'Keine Produkte',
            'reseller_title' => 'Nr. Produkte auf Lager',
            'total_available' => 'Insgesamt verfügbar',
            'cta' => 'Sicht'
        ],
        'orders' => [
            'title' => 'Nein. Bestellungen',
            'cta' => 'Zeige Details',
        ],
        'bestsellers' => [
            'title' => 'Meistverkaufte Produkte',
            'cta' => 'Alles sehen',
            'table' => [
                'cols' => [
                    'position' => 'Einstufung',
                    'id' => 'AUSWEIS',
                    'image' => 'Produktfotos',
                    'name' => 'Produktname',
                    'price' => 'Preis',
                ],
            ]
        ],
        'new-orders' => [
            'admin_title' => 'Neue Bestellungen',
            'reseller_title' => 'Neueste Bestellungen',
            'cta' => 'Alles sehen',
            'table' => [
                'cols' => [
                    'number' => 'Bestellnummer',
                    'date' => 'Auftragsdatum',
                    'customer' => 'Name des Kunden',
                    'price' => 'Preis',
                ],
            ]
        ],
        'sales' => [
            'main_title' => 'Monatsumsatz',
            'title' => 'Gesamtumsatz',
        ],
    ]
];
