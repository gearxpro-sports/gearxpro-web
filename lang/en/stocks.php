<?php

return [
    'title' => 'Warehouse',
    'index' => [
        'title' => 'Warehouse',
        'table' => [
            'title' => 'Warehouse Products',
            'cols'  => [
                'product'    => 'Product name',
                'sku'        => 'Product ID',
                'measures'   => 'Unit of measure',
                'quantity'   => 'Amount',
                'sale_price' => 'Selling price',
            ],
        ],
        'filter' => [
            'select_registration_date' => 'Select Registration Date',
        ],
    ],
    'modals' => [
        'edit-quantity' => [
            'title' => 'Edit stock quantity',
            'update' => 'Update'
        ],
    ]
];
