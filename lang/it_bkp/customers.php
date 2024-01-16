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
            'label' => 'Name',
        ],
        'lastname' => [
            'label' => 'Last name',
        ],
        'email' => [
            'label' => 'Email',
        ],
        'company' => [
            'label' => 'Company name',
        ],
        'address' => [
            'label' => 'Address',
        ],
        'city' => [
            'label' => 'City',
        ],
        'postcode' => [
            'label' => 'Zip code',
        ],
        'country' => [
            'label' => 'Country',
            'hint' => 'Select your country'
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
            'label' => 'Payment method',
        ],
        'addresses' => [
            'shipping' => 'Shipping address',
            'billing' => 'Billing address'
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
            'title' => 'Orders',
            'order' => 'Order',
            'status' => [
                'paid' => 'Order confirmed',
                'in_process' => 'In lavorazione',
                'in_shipping' => 'In transito',
                'shipped' => 'Spedito',
                'delivered' => 'Consegnato',
                'refunded' => 'Rimborsato',
                'canceled' => 'cancellato'
            ]
        ],
    ],
    'edit_data' => 'Update',
    'password' => 'Password',
    'format_password' => [
        'uppercase' => 'One character in UPPERCASE',
        'lowercase' => 'One character in LOWER CASE',
        'number' => 'One number',
        'length' => '8 Characters',
        'special_character' => 'One special character (&*€%)'
    ],
    'buttons' => [
        'cancel' => 'Clear',
        'save' => 'Save',
        'copy_shipping' => 'Like shipping',
        'back' => 'Back',
    ]
];
