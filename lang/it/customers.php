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
];
