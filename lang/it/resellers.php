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
                'country' => 'Nazione',
                'creation_date' => 'Data di Creazione',
                'last_login_date' => 'Data Ultimo Accesso',
            ],
            'disabled' => 'Disabilitato',
        ],
        'filter' => [
            'select_registration_date' => 'Seleziona Data Registrazione',
        ],
    ],
    'create' => [
        'title' => 'Crea Rivenditore',
        'titles' => [
            'general_data' => 'Dati generali',
            'billing_data' => 'Dati di Fatturazione',
            'shipping_data' => 'Dati di Spedizione',
            'tax' => 'Tassazione',
            'payment' => 'Pagamento',
            'stripe_account' => 'Account Stripe'
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
            'label' => 'ZIP code',
        ],
        'country' => [
            'label' => 'State',
            'hint' => 'Select your country'
        ],
        'vat_number' => [
            'label' => 'TAX code',
        ],
        'tax_code' => [
            'label' => 'Fiscal code',
        ],
        'phone' => [
            'label' => 'Phone number',
        ],
        'sdi' => [
            'label' => 'SDI code',
        ],
        'pec' => [
            'label' => 'Email PEC',
        ],
        'payment_method' => [
            'label' => 'Payment method',
        ],
        'tax' => [
            'label' => 'Iva %',
        ],
        'stripe_public_key' => [
            'label' => 'Chiave pubblica',
        ],
        'stripe_private_key' => [
            'label' => 'Chiave privata',
        ],
    ],
    'show' => [
        'titles' => [
            'data' => 'Dati rivenditore',
            'billing' => 'Dati di fatturazione',
            'shipping' => 'Dati di spedizione',
            'payment' => 'Metodo di pagamento'
        ],
        'data' => [
            'company' => 'Nome Azienda:',
            'lastname' => 'Cognome:',
            'email' => 'Email:',
            'creation_date' => 'Data di Creazione:',
            'last_login' => 'Ultimo accesso:',
            'address' => 'Indirizzo:',
            'city' => 'Città:',
            'postcode' => 'Cap:',
            'country' => 'Nazione:',
        ],
        'orders' => [
            'title' => 'Riepilogo Ordini',
        ],
    ],
    'edit' => [
        'title' => 'Modifica Rivenditore',
    ],
    'disable' => [
        'title' => 'Sei sicuro di voler disabilitare questo Rivenditore?',
        'confirm' => 'Disabilita'
    ],
    'enable' => [
        'title' => 'Sei sicuro di voler abilitare questo Rivenditore?',
        'already_exist' => "Attualmente esiste un altro Rivenditore legato alla nazione ':country'.<br>Abilitando questo Rivenditore, disabiliterai l'altro!",
        'confirm' => 'Abilita'
    ],
    'missing_data_modal' => [
        'title' => 'Completa il profilo',
        'intro' => 'Prima di proseguire compila e conferma i seguenti dati:',
    ],
];
