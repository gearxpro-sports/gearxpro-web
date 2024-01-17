<?php

use App\Models\Order;

return [
    'statuses' => [
        Order::PAID_STATUS => 'Bezahlt',
        Order::IN_PROCESS_STATUS => 'In Bearbeitung',
        Order::IN_SHIPPING_STATUS => 'Im Versand',
        Order::SHIPPED_STATUS => 'Ausgeliefert',
        Order::DELIVERED_STATUS => 'Geliefert',
        Order::CANCELED_STATUS => 'Gelöscht',
        Order::REFUNDED_STATUS => 'Erstattet',
    ],
    'title' => 'Auftragsverwaltung',
    'index' => [
        'title' => 'Auftragsverwaltung',
        'table' => [
            'title' => 'Aufträge',
            'cols' => [
                'order_number' => 'Bestellnummer',
                'order_date' => 'Auftragsdatum',
                'customer' => 'Name des Kunden',
                'total' => 'Gesamt €',
                'status' => 'Bestellstatus',
            ],
        ],
        'filter' => [
            'status' => 'Staat wählen',
            'date' => 'DDatum auswählen',
        ],
        'status_switcher' => [
            'selected_items' => 'Ausgewählte Artikel:',
            'deselect_all' => 'AAlles abwählen',
            'change_state' => 'Status ändern:',
        ],
    ],
    'show' => [
        'title' => 'Bestelldetails',
        'table' => [
            'title' => 'Gekaufte Produkte',
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
            'customer_data' => 'Kundendaten',
            'shipping_data' => 'Versanddaten',
            'billing_data' => 'Rechnungsdaten',
            'payment_data' => 'Zahlungsinformationen',
            'payment_method' => 'Bezahlverfahren',
        ],
        'alert' => [
            'changing_status' => [
                Order::SHIPPED_STATUS => 'Sind Sie sicher, dass Sie die Bestellung als versendet markieren? Der Vorgang kann nicht abgebrochen werden.',
                Order::DELIVERED_STATUS => 'Sind Sie sicher, dass Sie die Bestellung als geliefert markieren? Der Vorgang kann nicht abgebrochen werden.',
                Order::CANCELED_STATUS => 'Sind Sie sicher, dass Sie die Bestellung stornieren möchten? Der Vorgang kann nicht abgebrochen werden.',
                Order::REFUNDED_STATUS => 'Möchten Sie die Bestellung wirklich als erstattet markieren? Der Vorgang kann nicht abgebrochen werden.',
            ],
        ],
        'order_date' => 'Auftragsdatum',
        'ship_date' => 'Versanddatum',
        'order_total' => 'Gesamtbestellung',
        'order_state' => 'Bestellstatus',
        'summary' => [
            'subtotal' => 'Zwischensumme',
            'shipping_costs' => 'Versand',
            'tax' => 'MwSt',
            'total' => 'Gesamt (Euro):',
        ],
        'shipping_details' => 'Versanddetails',
        'stripe_receipt' => 'Stripe-Zahlungsbeleg anzeigen',
    ],
];
