<?php

return [
    'statuses' => [
        'to_pay' => 'Da pagare',
        'not_payed' => 'Non pagato',
        'payed' => 'Pagato',
    ],
    'index' => [
        'title' => 'Fatture Acquisto',
        'table' => [
            'title' => 'Acquisti',
            'cols' => [
                'invoice_code' => 'Numero Fattura',
                'invoice_date' => 'Data Fattura',
                'amount' => 'Importo',
                'payment_status' => 'Stato Pagamento',
            ],
        ],
        'filter' => [
            'status' => 'Seleziona stato',
            'dates' => 'Seleziona data',
        ],
    ],
    'show' => [
        'invoice_n' => 'Fattura n.',
        'of' => 'del',
        'customer' => 'Cliente',
        'customer_tax_codes' => 'P.IVA / Codice Fiscale',
        'table' => [
            'sku' => 'Codice Articolo',
            'description' => 'Descrizione',
            'quantity' => 'Quantità',
            'unit_price' => 'Prezzo unitario',
            'total' => 'Importo',
            'vat' => 'IVA',
            'taxable' => 'Imponibile',
            'vat_tax' => 'Imposta IVA',
            'invoice_amount' => 'Totale Fattura'
        ],
        'payment_method' => 'Modalità di Pagamento'
    ],
];
