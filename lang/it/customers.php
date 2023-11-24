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
        ],
        'addresses' => [
            'shipping' => 'Indirizzo spedizione',
            'billing' => 'Indirizzo fatturazione'
        ],
    ],
    'profile' => 'Profilo',
    'profile_description' => 'Visualizza i tuoi dati, le impostazioni di accesso e password, i tuoi ordini.',
    'tabs' => [
        'personal_data' => [
            'title' => 'Dati personali',
            'user' => 'Modifica utente',
            'email' => 'Modifica Email',
            'password' => 'Modifica Password'
        ],
        'addresses' => [
            'title' => 'Indirizzi',
            'address' => 'Modifica Indirizzi'
        ],
        'orders' => [
            'title' => 'Ordini',
            'order' => 'Ordine',
            'status' => [
                'paid' => 'Ordine confermato',
                'in_process' => 'In lavorazione',
                'in_shipping' => 'In transito',
                'shipped' => 'Spedito',
                'delivered' => 'Consegnato',
                'refunded' => 'Rimborsato',
                'canceled' => 'cancellato'
            ]
        ],
    ],
    'edit_data' => 'Modifica',
    'password' => 'Password',
    'format_password' => [
        'uppercase' => 'Un carattere in MAIUSCOLO',
        'lowercase' => 'Un carattere in minuscolo',
        'number' => 'Un numero',
        'length' => '8 caratteri',
        'special_character' => 'Un carattere speciale (&*€%)'
    ],
    'buttons' => [
        'cancel' => 'Annulla',
        'save' => 'Salva',
        'copy_shipping' => 'Uguale a Spedizione',
        'back' => 'Indietro',
    ]
];
