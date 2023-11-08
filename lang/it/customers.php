<?php

return [
    'title' => 'Anagrafica Clienti',
    'index' => [
        'title' => 'Anagrafica Clienti',
        'table' => [
            'title' => 'Clienti',
            'cols'  => [
                'name'              => 'Nome Cliente',
                'email'             => 'Indirizzo Email',
                'reseller'          => 'Rivenditore',
                'registration_date' => 'Data di Registrazione',
                'last_order_date'   => 'Data Ultimo Ordine',
            ],
        ],
        'filter' => [
            'select_registration_date' => 'Seleziona Data Registrazione',
        ],
    ],
    'show' => [
        'title' => 'Profilo Cliente',
        'data'  => [
            'title'             => 'Dati Cliente',
            'firstname'         => 'Nome:',
            'lastname'          => 'Cognome:',
            'email'             => 'Email:',
            'registration_date' => 'Data di Registrazione:',
            'address'           => 'Indirizzo:',
            'city'              => 'Città:',
            'postcode'          => 'Cap:',
            'country'           => 'Paese:',
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
