<?php

return [
    'statuses' => [
        'to_pay' => 'Pagar',
        'not_payed' => 'No pagado',
        'payed' => 'Pagado',
    ],
    'index' => [
        'title' => 'Facturas de compra',
        'table' => [
            'title' => 'Adquisiciones',
            'cols' => [
                'invoice_code' => 'Número de factura',
                'invoice_date' => 'Fecha de la factura',
                'user' => 'Nombre de pila',
                'amount' => 'Cantidad',
                'payment_status' => 'Estado de pago',
            ],
        ],
        'filter' => [
            'status' => 'Seleccione estado',
            'dates' => 'Seleccione fecha',
        ],
    ],
    'show' => [
        'invoice_n' => 'Factura no.',
        'of' => 'del',
        'customer' => 'Cliente',
        'customer_tax_codes' => 'Número de IVA / Código Fiscal',
        'table' => [
            'sku' => 'Número de artículo',
            'description' => 'Descripción',
            'quantity' => 'Cantidad',
            'unit_price' => 'Precio unitario',
            'total' => 'Cantidad',
            'vat' => 'IVA',
            'taxable' => 'Imponible',
            'vat_tax' => 'impuesto IVA',
            'invoice_amount' => 'Total de la factura'
        ],
        'payment_method' => 'Condiciones de pago'
    ],
];
