<?php

return [
    'title' => 'Anagrafica Clienti',
    'index' => [
        'title' => 'Anagrafica Clienti',
        'title-agent' => 'Anagrafica Clienti per Agente',
        'table' => [
            'title' => 'Clienti',
            'cols'  => [
                'name'              => 'Nome Cliente',
                'email'             => 'Indirizzo Email',
                'reseller'          => 'Rivenditore',
                'registration_date' => 'Data di Registrazione',
                'last_order_date'   => 'Data Ultimo Ordine',
                'country'           => 'Nazione',
                'agent'             => 'Agente'
            ],
        ],
        'filter' => [
            'select_registration_date' => 'Seleziona Data Registrazione',
        ],
    ],
    'show' => [
        'title' => 'Profilo cliente',
        'data'  => [
            'title'             => 'Dati Cliente',
            'firstname'         => 'Nome:',
            'lastname'          => 'Cognome:',
            'email'             => 'Email:',
            'registration_date' => 'Data di Registrazione:',
            'address'           => 'Indirizzo:',
            'city'              => 'Città:',
            'postcode'          => 'CAP:',
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
            'label' => 'Ragione sociale',
        ],
        'address' => [
            'label' => 'Indirizzo',
        ],
        'city' => [
            'label' => 'Città',
        ],
        'postcode' => [
            'label' => 'CAP',
        ],
        'country' => [
            'label' => 'Nazione',
            'hint' => 'Seleziona la tua nazione'
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
            'label' => 'PEC',
        ],
        'payment_method' => [
            'label' => 'Metodo di pagamento',
        ],
        'addresses' => [
            'shipping' => 'Indirizzo di spedizione',
            'billing' => 'Indirizzo di fatturazione'
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
                'canceled' => 'Cancellato'
            ]
        ],
    ],
    'edit_data' => 'Modifica',
    'password' => 'Password',
    'format_password' => [
        'uppercase' => 'Un carattere maiuscolo',
        'lowercase' => 'Un carattere minuscolo',
        'number' => 'Un numero',
        'length' => '8 caratteri',
        'special_character' => 'Un carattere speciale (&*€%)'
    ],
    'buttons' => [
        'cancel' => 'Cancella',
        'save' => 'Salva',
        'copy_shipping' => 'Come indirizzo di spedizione',
        'back' => 'Indietro',
    ]
];
