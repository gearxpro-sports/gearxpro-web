<?php

return [
    'title' => 'Approvvigionamento',
    'index' => [
        'title' => 'Approvvigionamento',
        'table' => [
            'title' => 'Lista Referenze',
            'cols' => [
                'product_name' => 'Nome Prodotto',
                'product_id' => 'ID Prodotto',
                'measures' => 'Misure',
                'unit_of_measurement' => 'Unità di misura',
                'sale_price' => 'Prezzo Vendita',
                'purchase_price' => 'Prezzo Acquisto',
                'quantity' => 'Quantità',
                'manufacturer_availability' => 'Disp. Produttore'
            ],
        ],
        'filter' => [
            'prices' => 'Seleziona prezzo..',
            'availabilities' => 'Seleziona disponibilità..',
        ],
    ],
    'show' => [
        'title' => 'Profilo Cliente',
        'data' => [
            'title' => 'Dati Cliente',
            'firstname' => 'Nome:',
            'lastname' => 'Cognome:',
            'email' => 'Email:',
            'registration_date' => 'Data di Registrazione:',
            'address' => 'Indirizzo:',
            'city' => 'Città:',
            'postcode' => 'Cap:',
            'country' => 'Paese:',
        ],
        'orders' => [
            'title' => 'Riepilogo Ordini',
        ],
    ],
    'edit' => [
        'title' => 'Modifica Cliente',
        'titles' => [
            'general_data' => 'Dati generali',
            'billing_data' => 'Dati di Fatturazione',
            'shipping_data' => 'Dati di Spedizione',
            'payment' => 'Pagamento',
        ],
        'firstname' => [
            'label' => 'Nome',
        ],
        'lastname' => [
            'label' => 'Cognome',
        ],
        'email' => [
            'label' => 'Email',
        ],
        'company' => [
            'label' => 'Ragione Sociale',
        ],
        'address' => [
            'label' => 'Via',
        ],
        'city' => [
            'label' => 'Città',
        ],
        'postcode' => [
            'label' => 'CAP',
        ],
        'country' => [
            'label' => 'Nazione',
            'hint' => 'Seleziona la Nazione dove opera questo rivenditore'
        ],
        'vat_number' => [
            'label' => 'Partita IVA',
        ],
        'tax_code' => [
            'label' => 'Codice Fiscale',
        ],
        'phone' => [
            'label' => 'Telefono',
        ],
        'sdi' => [
            'label' => 'Codice SDI',
        ],
        'pec' => [
            'label' => 'Email PEC',
        ],
        'payment_method' => [
            'label' => 'Metodo di Pagamento',
        ]
    ],
];
