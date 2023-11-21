<?php

return [
    'statuses' => [
        'canceled' => 'Cancellato',
        'paid' => 'Pagato',
        'in_preparation' => 'In Preparazione',
        'shipped' => 'Spedito',
        'delivered' => 'Consegnato',
        'refunded' => 'Rimborsato',
    ],
    'title' => 'Gestione Ordini',
    'index' => [
        'title' => 'Gestione Ordini',
        'table' => [
            'title' => 'Ordini',
            'cols' => [
                'order_number' => 'Numero Ordine',
                'order_date' => 'Data Ordine',
                'customer' => 'Nome Cliente',
                'total' => 'Totale €',
                'status' => 'Stato Ordine',
            ],
        ],
        'filter' => [
            'status' => 'Seleziona stato',
            'date' => 'Seleziona data',
        ],
    ],
    'show' => [
        'title' => 'Dettagli Ordine',
        'table' => [
            'title' => 'Prodotti Acquistati',
            'cols' => [
                'name' => 'Nome Prodotto',
                'id' => 'ID Prodotto',
                'price' => 'Prezzo',
                'quantity' => 'Quantità',
                'total' => 'Totale per Quantità',
            ],
        ],
        'top_bar' => [
            'order_number' => 'Ordine Numero',
        ],
        'boxes' => [
            'customer_data' => 'Dati Cliente',
            'shipping_data' => 'Dati Spedizione',
            'billing_data' => 'Dati Fatturazione',
            'payment_data' => 'Informazioni Pagamento',
            'payment_method' => 'Metodo di pagamento',
        ],
        'alert' => [
            'changing_status' => [
                'delivered' => 'Confermi di contrassegnare l\'ordine come consegnato? L\'operazione non potrà essere annullata.',
                'canceled' => 'Confermi di annullare l\'ordine? L\'operazione non potrà essere annullata.',
                'refunded' => 'Confermi di contrassegnare l\'ordine come rimborsato? L\'operazione non potrà essere annullata.',
            ],
        ],
        'order_date' => 'Data Ordine',
        'ship_date' => 'Data Spedizione',
        'order_total' => 'Totale Ordine',
        'order_state' => 'Stato Ordine',

    ],
];
