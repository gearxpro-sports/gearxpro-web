<?php

return [
    'title' => 'Einzelhändler',
    'index' => [
        'title' => 'Einzelhändler',
        'table' => [
            'title' => 'Einzelhändler',
            'cols' => [
                'company' => 'Name der Firma',
                'email' => 'Email',
                'country' => 'Nation',
                'creation_date' => 'Erstellungsdatum',
                'last_login_date' => 'Datum des letzten Zugriffs',
            ],
            'disabled' => 'Deaktiviert',
        ],
        'filter' => [
            'select_registration_date' => 'Wählen Sie Registrierungsdatum',
        ],
    ],
    'create' => [
        'title' => 'Reseller erstellen',
        'titles' => [
            'general_data' => 'Allgemeine Daten',
            'billing_data' => 'Abrechnungsdaten',
            'shipping_data' => 'Versanddaten',
            'tax' => 'Besteuerung',
            'payment' => 'Zahlung',
            'stripe_account' => 'Stripe-Konten'
        ],
        'firstname' => [
            'label' => 'Vorname',
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
        'civic' => [
            'label' => 'Hausnummer',
        ],
        'city' => [
            'label' => 'Stadt',
        ],
        'postcode' => [
            'label' => 'Postleitzahl',
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
        'tax' => [
            'label' => 'MwSt. %',
        ],
        'stripe_public_key' => [
            'label' => 'Öffentlicher Schlüssel',
        ],
        'stripe_private_key' => [
            'label' => 'Privat Schlüssel',
        ],
    ],
    'show' => [
        'titles' => [
            'data' => 'Händlerdaten',
            'billing' => 'Abrechnungsdaten',
            'shipping' => 'Versanddaten',
            'payment' => 'Bezahlverfahren'
        ],
        'data' => [
            'company' => 'Name der Firma:',
            'lastname' => 'Nachname:',
            'email' => 'Email:',
            'creation_date' => 'Erstellungsdatum:',
            'last_login' => 'Letzter Zugriff:',
            'address' => 'Adresse:',
            'city' => 'Stadt:',
            'postcode' => 'Postleitzahl:',
            'country' => 'Nation:',
        ],
        'orders' => [
            'title' => 'Bestellübersicht',
        ],
    ],
    'edit' => [
        'title' => 'Händler bearbeiten',
    ],
    'disable' => [
        'title' => 'Sind Sie sicher, dass Sie diesen Reseller deaktivieren möchten?',
        'confirm' => 'Deaktivieren'
    ],
    'enable' => [
        'title' => 'Sind Sie sicher, dass Sie diesen Reseller aktivieren möchten?',
        'already_exist' => "Derzeit gibt es einen weiteren Reseller, der mit der Nation „:country“ verknüpft ist.<br>Durch die Aktivierung dieses Resellers deaktivieren Sie den anderen Reseller!",
        'confirm' => 'Fähigkeit'
    ],
    'missing_data_modal' => [
        'title' => 'Vervollständigen Sie das Profil',
        'intro' => 'Bevor Sie fortfahren, füllen Sie die folgenden Daten aus und bestätigen Sie sie:',
    ],
];
