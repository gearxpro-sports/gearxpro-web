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
                'unit_of_measurement' => 'Unità di misura',
                'sale_price' => 'Prezzo Vendita',
                'purchase_price' => 'Prezzo Acquisto',
                'quantity' => 'Quantità',
                'manufacturer_availability' => 'Disp. Produttore'
            ],
        ],
        'filter' => [
            'prices' => 'Seleziona prezzo',
            'availabilities' => 'Seleziona disponibilità',
        ],
    ],
    'show' => [
        'title' => 'Profilo Cliente',
        'data' => [
            'title' => 'Dati Cliente',
            'firstname' => 'Nome:',
            'lastname' => 'Cognome:',
            'email' => 'Email:',
            'registration_date' => 'Data di Registrazione:',
            'address' => 'Indirizzo:',
            'city' => 'Città:',
            'postcode' => 'Cap:',
            'country' => 'Paese:',
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
            'label' => 'Nome',
        ],
        'lastname' => [
            'label' => 'Cognome',
        ],
        'email' => [
            'label' => 'Email',
        ],
        'company' => [
            'label' => 'Ragione Sociale',
        ],
        'address' => [
            'label' => 'Via',
        ],
        'city' => [
            'label' => 'Città',
        ],
        'postcode' => [
            'label' => 'CAP',
        ],
        'country' => [
            'label' => 'Nazione',
            'hint' => 'Seleziona la Nazione dove opera questo rivenditore'
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
            'label' => 'Metodo di Pagamento',
        ]
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
                    'reseller' => 'Rivenditore',
                ],
            ],
            'filter' => [
                'status' => 'Seleziona stato',
                'date' => 'Seleziona data',
            ],
        ],
        'show' => [
            'title' => 'Dettaglio acquisto',
            'table' => [
                'title' => 'Lista Approvvigionamento',
                'cols' => [
                    'name' => 'Nome Prodotto',
                    'id' => 'ID Prodotto',
                    'price' => 'Prezzo',
                    'quantity' => 'Quantità',
                    'total' => 'Totale per Quantità',
                ],
            ],
            'alert' => [
                'changing_status' => [
                    'delivered' => 'Confermi di contrassegnare l\'ordine come consegnato? L\'operazione non potrà essere annullata.',
                    'canceled' => 'Confermi di annullare l\'ordine? L\'operazione non potrà essere annullata.',
                ],
            ],
            'supply_date' => 'Data Approvvigionamento',
            'ship_date' => 'Data Spedizione',
            'supply_total' => 'Totale Ordine Approvvigionamento',
            'supply_state' => 'Stato Ordine',
        ], 
    ]
];
