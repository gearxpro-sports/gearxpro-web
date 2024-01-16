<?php

return [
    'statuses' => [
        'new' => 'Neu',
        'in_process' => 'In Bearbeitung',
        'on_delivery' => 'Liefern',
        'delivered' => 'Geliefert',
        'canceled' => 'Abgesagt',
    ],
    'title' => 'Liefern',
    'index' => [
        'title' => 'Liefern',
        'table' => [
            'title' => 'Referenzliste',
            'cols' => [
                'product_name' => 'Produktname',
                'product_id' => 'Produkt ID',
                'measures' => 'Maßnahmen',
                'length' => 'Beinlänge',
                'unit_of_measurement' => 'Maßeinheit',
                'sale_price' => 'Verkaufspreis',
                'purchase_price' => 'Kaufpreis',
                'quantity' => 'Menge',
                'manufacturer_availability' => 'Verfügbar. Hersteller'
            ],
            'footer' => [
                'cart_total' => 'Warenkorb insgesamt',
                'review_order' => 'Überprüfen Sie die Bestellung'
            ]
        ],
        'filter' => [
            'prices' => 'Preis auswählen',
            'availabilities' => 'Verfügbarkeit auswählen',
        ],
    ],
    'purchases' => [
        'index' => [
            'title' => 'Einkaufsliste',
            'table' => [
                'title' => 'Akquisitionen',
                'cols' => [
                    'order_number' => 'Bestellnummer',
                    'order_date' => 'Auftragsdatum',
                    'total' => 'Menge',
                    'status' => 'Zustand',
                    'reseller' => 'Händler',
                ],
                'trashed' => 'Gelöscht'
            ],
            'filter' => [
                'status' => 'Staat wählen',
                'date' => 'Datum auswählen',
                'select_order_date' => 'Wählen Sie Bestelldatum aus'
            ],
        ],
        'show' => [
            'title' => 'Kaufdetails',
            'table' => [
                'title' => 'Versorgungsliste',
                'cols' => [
                    'name' => 'Produktname',
                    'id' => 'Produkt ID',
                    'price' => 'Preis',
                    'quantity' => 'Menge',
                    'total' => 'Gesamt nach Menge',
                ],
            ],
            'top_bar' => [
                'order_number' => 'Bestellnummer',
            ],
            'boxes' => [
                'reseller_data' => 'Reseller-Daten',
                'shipping_data' => 'Versanddaten',
                'billing_data' => 'Rechnungsdaten',
                'payment_data' => 'Zahlungsinformationen',
                'payment_method' => 'Bezahlverfahren',
            ],
            'alert' => [
                'changing_status' => [
                    'delivered' => 'Sind Sie sicher, dass Sie die Bestellung als geliefert markieren? Der Vorgang kann nicht abgebrochen werden.',
                    'canceled' => 'Sind Sie sicher, dass Sie die Bestellung stornieren möchten? Der Vorgang kann nicht abgebrochen werden.',
                ],
            ],
            'supply_date' => 'Beschaffungsdatum',
            'ship_date' => 'Versanddatum',
            'supply_total' => 'Gesamtlieferauftrag',
            'supply_state' => 'Bestellstatus',

        ],
    ],
    'recap' => [
        'title' => 'Bestellübersicht',
        'table' => [
            'title' => 'Produkte',
            'cols' => [
                'product_name' => 'Produktname',
                'measures' => 'Maßnahmen',
                'purchase_price' => 'Kaufpreis',
                'quantity' => 'Menge',
                'total' => 'Gesamt',
            ],
        ],
        'order_review' => [
            'order' => [
                'title' => 'Gesamtbestellung',
                'subtotal' => 'Zwischensumme',
                'shipping_cost' => 'Versandkosten',
                'vat' => 'MwSt',
                'total' => 'Gesamt'
            ],
            'shipping' => [
                'title' => 'Versandinformation',
                'receiver' => 'Empfänger',
                'address' => 'Adresse',
                'phone' => 'Telefon',
                'email' => 'Email',
                'warning' => [
                    'missing_shipping_address' => 'Fehlende Lieferadresse.',
                    'cta' => 'Jetzt hinzufügen!',
                ]
            ],
            'payment' => [
                'title' => 'Zahlung',
            ],
            'confirm' => 'Bestellung bestätigen'
        ],
    ],
];
