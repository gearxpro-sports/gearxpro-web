<?php

return [
    'statuses' => [
        'to_pay' => 'Bezahlen',
        'not_payed' => 'Unbezahlt',
        'payed' => 'Bezahlt',
    ],
    'index' => [
        'title' => 'Kaufrechnungen',
        'table' => [
            'title' => 'Akquisitionen',
            'cols' => [
                'invoice_code' => 'Rechnungsnummer',
                'invoice_date' => 'Rechnungsdatum',
                'user' => 'Vorname',
                'amount' => 'Menge',
                'payment_status' => 'Zahlungsstatus',
            ],
        ],
        'filter' => [
            'status' => 'Staat wählen',
            'dates' => 'Datum auswählen',
        ],
    ],
    'show' => [
        'invoice_n' => 'Rechnungsnr.',
        'of' => 'des',
        'customer' => 'Kunde',
        'customer_tax_codes' => 'Umsatzsteuer-Identifikationsnummer / Steuernummer',
        'table' => [
            'sku' => 'Artikelnummer',
            'description' => 'Beschreibung',
            'quantity' => 'Menge',
            'unit_price' => 'Einzelpreis',
            'total' => 'Menge',
            'vat' => 'MwSt',
            'taxable' => 'Steuerpflichtig',
            'vat_tax' => 'Mehrwertsteuer',
            'invoice_amount' => 'Gesamtrechnung'
        ],
        'payment_method' => 'Zahlungsbedingungen'
    ],
];
