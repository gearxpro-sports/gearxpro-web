<?php

use App\Models\Order;

return [
    'statuses' => [
        Order::PAID_STATUS => 'Pagato',
        Order::IN_PROCESS_STATUS => 'In Lavorazione',
        Order::IN_SHIPPING_STATUS => 'In Spedizione',
        Order::SHIPPED_STATUS => 'Spedito',
        Order::DELIVERED_STATUS => 'Consegnato',
        Order::CANCELED_STATUS => 'Cancellato',
        Order::REFUNDED_STATUS => 'Rimborsato',
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
        'status_switcher' => [
            'selected_items' => 'Elementi selezionati:',
            'deselect_all' => 'Deselaziona tutto',
            'change_state' => 'Cambia Stato:',
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
                Order::SHIPPED_STATUS => 'Confermi di contrassegnare l\'ordine come spedito? L\'operazione non potrà essere annullata.',
                Order::DELIVERED_STATUS => 'Confermi di contrassegnare l\'ordine come consegnato? L\'operazione non potrà essere annullata.',
                Order::CANCELED_STATUS => 'Confermi di annullare l\'ordine? L\'operazione non potrà essere annullata.',
                Order::REFUNDED_STATUS => 'Confermi di contrassegnare l\'ordine come rimborsato? L\'operazione non potrà essere annullata.',
            ],
        ],
        'order_date' => 'Data Ordine',
        'ship_date' => 'Data Spedizione',
        'order_total' => 'Totale Ordine',
        'order_state' => 'Stato Ordine',
        'summary' => [
            'subtotal' => 'Subtotale:',
            'shipping_costs' => 'Spedizione:',
            'tax' => 'Iva:',
            'total' => 'Totale (Euro):',
        ],
        'shipping_details' => 'Dettagli Spedizione',
        'stripe_receipt' => 'Visualizza ricevuta di pagamento Stripe',
    ],
];
