<?php

return [
    'statuses' => [
        'new' => 'Nuovo',
        'in_process' => 'In lavorazione',
        'on_delivery' => 'In consegna',
        'delivered' => 'Consegnato',
        'canceled' => 'Annullato',
    ],
    'title' => 'Approvvigionamento',
    'index' => [
        'title' => 'Approvvigionamento',
        'table' => [
            'title' => 'Lista Referenze',
            'cols' => [
                'product_name' => 'Nome Prodotto',
                'product_id' => 'ID Prodotto',
                'measures' => 'Misure',
                'length' => 'Lunghezza gamba',
                'unit_of_measurement' => 'Unità di misura',
                'sale_price' => 'Prezzo Vendita',
                'purchase_price' => 'Prezzo Acquisto',
                'quantity' => 'Quantità',
                'manufacturer_availability' => 'Disp. Produttore'
            ],
            'footer' => [
                'cart_total' => 'Totale Carrello',
                'review_order' => 'Rivedi Ordine'
            ]
        ],
        'filter' => [
            'prices' => 'Seleziona prezzo',
            'availabilities' => 'Seleziona disponibilità',
        ],
    ],
    'purchases' => [
        'index' => [
            'title' => 'Lista Acquisti',
            'table' => [
                'title' => 'Acquisti',
                'cols' => [
                    'order_number' => 'Numero Ordine',
                    'order_date' => 'Data Ordine',
                    'total' => 'Importo',
                    'status' => 'Stato',
                ],
            ],
            'filter' => [
                'status' => 'Seleziona stato',
                'date' => 'Seleziona data',
            ],
        ],
    ],
    'recap' => [
        'title' => 'Riepilogo Ordine',
        'table' => [
            'title' => 'Prodotti',
            'cols' => [
                'product_name' => 'Nome Prodotto',
                'measures' => 'Misure',
                'purchase_price' => 'Prezzo Acquisto',
                'quantity' => 'Quantità',
                'total' => 'Totale',
            ],
        ],
        'order_review' => [
            'order' => [
                'title' => 'Totale Ordine',
                'subtotal' => 'Subtotale',
                'shipping_cost' => 'Costo di Spedizione',
                'vat' => 'IVA',
                'total' => 'Totale'
            ],
            'shipping' => [
                'title' => 'Info Spedizione',
                'receiver' => 'Destinatario',
                'address' => 'Indirizzo',
                'phone' => 'Telefono',
                'email' => 'Email',
            ],
            'payment' => [
                'title' => 'Pagamento',
            ],
            'confirm' => 'Conferma Ordine'
        ],
    ],
];
