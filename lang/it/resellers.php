<?php

return [
    'title' => 'Rivenditori',
    'index' => [
        'title' => 'Rivenditori',
        'table' => [
            'title' => 'Rivenditori',
            'cols' => [
                'company' => 'Nome Azienda',
                'email' => 'Email',
                'creation_date' => 'Data di Creazione',
                'last_login_date' => 'Data Ultimo Accesso',
            ],
        ],
        'filter' => [
            'select_registration_date' => 'Seleziona Data Registrazione',
        ],
    ],
    'create' => [
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
    'show' => [
        'title' => 'Profilo Rivenditore',
        'data' => [
            'title' => 'Dati Rivenditore',
            'company' => 'Nome Azienda:',
            'lastname' => 'Cognome:',
            'email' => 'Email:',
            'creation_date' => 'Data di Creazione:',
            'last_login' => 'Ultimo accesso:',
            'address' => 'Indirizzo:',
            'city' => 'Città:',
            'postcode' => 'Cap:',
            'country' => 'Paese:',
        ],
        'orders' => [
            'title' => 'Riepilogo Ordini',
        ],
    ],
];
