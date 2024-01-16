<?php

return [
    'statuses' => [
        'to_pay' => 'To pay',
        'not_payed' => 'Unpaid',
        'payed' => 'Paid',
    ],
    'index' => [
        'title' => 'Purchase Invoices',
        'table' => [
            'title' => 'Acquisitions',
            'cols' => [
                'invoice_code' => 'Invoice number',
                'invoice_date' => 'Invoice date',
                'user' => 'First name',
                'amount' => 'Amount',
                'payment_status' => 'Payment Status',
            ],
        ],
        'filter' => [
            'status' => 'Select state',
            'dates' => 'Select date',
        ],
    ],
    'show' => [
        'invoice_n' => 'Invoice No.',
        'of' => 'of the',
        'customer' => 'Customer',
        'customer_tax_codes' => 'VAT number / Tax Code',
        'table' => [
            'sku' => 'Item number',
            'description' => 'Description',
            'quantity' => 'Amount',
            'unit_price' => 'Unit price',
            'total' => 'Amount',
            'vat' => 'VAT',
            'taxable' => 'Taxable',
            'vat_tax' => 'VAT tax',
            'invoice_amount' => 'Total invoice'
        ],
        'payment_method' => 'MTerms of payment'
    ],
];
