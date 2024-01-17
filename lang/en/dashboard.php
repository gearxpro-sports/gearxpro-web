<?php

return [
    'title' => 'Dashboards',
    'cards' => [
        'stocks' => [
            'admin_title' => 'No. Products',
            'reseller_title' => 'No. Products in stock',
            'total_available' => 'Total Available',
            'cta' => 'View'
        ],
        'orders' => [
            'title' => 'No. Orders',
            'cta' => 'Show details',
        ],
        'bestsellers' => [
            'title' => 'Best-selling products',
            'cta' => 'See all',
            'table' => [
                'cols' => [
                    'position' => 'Classification',
                    'id' => 'ID',
                    'image' => 'Product Photos',
                    'name' => 'Product name',
                    'price' => 'Price',
                ],
            ]
        ],
        'new-orders' => [
            'admin_title' => 'New Orders',
            'reseller_title' => 'Latest Orders',
            'cta' => 'See all',
            'table' => [
                'cols' => [
                    'number' => 'Order number',
                    'date' => 'Order date',
                    'customer' => 'Customer\'s name',
                    'price' => 'Price',
                ],
            ]
        ],
        'sales' => [
            'main_title' => 'Monthly Sales',
            'title' => 'Total sales',
        ],
    ]
];
