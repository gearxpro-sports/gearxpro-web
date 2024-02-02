<?php

return [
    'title' => 'Kundenregister',
    'index' => [
        'title' => 'Kundenregister',
        'table' => [
            'title' => 'Kunden',
            'cols'  => [
                'name'              => 'Name des Kunden',
                'email'             => 'E-Mail-Adresse',
                'reseller'          => 'Händler',
                'registration_date' => 'Registrierungsdatum',
                'last_order_date'   => 'Letztes Bestelldatum',
            ],
        ],
        'filter' => [
            'select_registration_date' => 'Wählen Sie Registrierungsdatum',
        ],
    ],
    'show' => [
        'title' => 'Kundendaten',
        'data'  => [
            'title'             => 'Kundendaten',
            'firstname'         => 'Vorname:',
            'lastname'          => 'Nachname:',
            'email'             => 'Email:',
            'registration_date' => 'Registrierungsdatum:',
            'address'           => 'Adresse:',
            'city'              => 'Stadt:',
            'postcode'          => 'Postleitzahl:',
            'country'           => 'Dorf:',
        ],
        'orders' => [
            'title' => 'Bestellübersicht',
        ],
    ],
    'edit' => [
        'title' => 'Kunde bearbeiten',
        'titles' => [
            'general_data' => 'Allgemeine Daten',
            'billing_data' => 'Abrechnungsdaten',
            'shipping_data' => 'Versanddaten',
            'payment' => 'Zahlung',
        ],
        'firstname' => [
            'label' => 'Name',
        ],
        'lastname' => [
            'label' => 'Nachname',
        ],
        'email' => [
            'label' => 'Email',
        ],
        'company' => [
            'label' => 'Firmenname',
        ],
        'address' => [
            'label' => 'Adresse',
        ],
        'city' => [
            'label' => 'Stadt',
        ],
        'postcode' => [
            'label' => 'POSTLEITZAHL',
        ],
        'country' => [
            'label' => 'Nation',
            'hint' => 'Wähle dein Land'
        ],
        'vat_number' => [
            'label' => 'Umsatzsteuer-Identifikationsnummer',
        ],
        'tax_code' => [
            'label' => 'Steuer-ID-Code',
        ],
        'phone' => [
            'label' => 'Telefon',
        ],
        'sdi' => [
            'label' => 'SDI-Code',
        ],
        'pec' => [
            'label' => 'PEC-E-Mail',
        ],
        'payment_method' => [
            'label' => 'Bezahlverfahren',
        ],
        'addresses' => [
            'shipping' => 'Lieferanschrift',
            'billing' => 'Rechnungsadresse'
        ],
    ],
    'profile' => 'Profil',
    'profile_description' => 'Sehen Sie sich Ihre Daten, Login- und Passworteinstellungen sowie Ihre Bestellungen an.',
    'tabs' => [
        'personal_data' => [
            'title' => 'persönliche Daten',
            'user' => 'Benutzer bearbeiten',
            'email' => 'E-Mail bearbeiten',
            'password' => 'Kennwort ändern'
        ],
        'addresses' => [
            'title' => 'Adressen',
            'address' => 'Adressen bearbeitens'
        ],
        'orders' => [
            'title' => 'Aufträge',
            'order' => 'Aufträge',
            'status' => [
                'paid' => 'Bestellung bestätigt',
                'in_process' => 'In Bearbeitung',
                'in_shipping' => 'Unterwegs',
                'shipped' => 'Ausgeliefert',
                'delivered' => 'Geliefert',
                'refunded' => 'Erstattet',
                'canceled' => 'gelöscht'
            ]
        ],
    ],
    'edit_data' => 'Gelöscht',
    'password' => 'Passwort',
    'format_password' => [
        'uppercase' => 'Ein Großbuchstabe',
        'lowercase' => 'Ein Kleinbuchstabe',
        'number' => 'Eine Zahl',
        'length' => '8 Charaktere',
        'special_character' => 'Ein Sonderzeichen (&*€%)'
    ],
    'buttons' => [
        'cancel' => 'Stornieren',
        'save' => 'Speichern',
        'copy_shipping' => 'Als Lieferadresse',
        'back' => 'Rückwärts',
    ]
];
