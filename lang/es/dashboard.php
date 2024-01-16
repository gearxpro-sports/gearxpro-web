<?php

return [
    'title' => 'Paneles de control',
    'cards' => [
        'stocks' => [
            'admin_title' => 'Sin productos',
            'reseller_title' => 'No. Productos en stock',
            'total_available' => 'Total disponible',
            'cta' => 'Vista'
        ],
        'orders' => [
            'title' => 'N° de pedidos',
            'cta' => 'Mostrar detalles',
        ],
        'bestsellers' => [
            'title' => 'Productos más vendidos',
            'cta' => 'Ver todo',
            'table' => [
                'cols' => [
                    'position' => 'Clasificación',
                    'id' => 'IDENTIFICACIÓN',
                    'image' => 'Fotos del producto',
                    'name' => 'Nombre del producto',
                    'price' => 'Precio',
                ],
            ]
        ],
        'new-orders' => [
            'admin_title' => 'Nuevos pedidos',
            'reseller_title' => 'Últimos pedidos',
            'cta' => 'Ver todo',
            'table' => [
                'cols' => [
                    'number' => 'Número de orden',
                    'date' => 'Fecha de orden',
                    'customer' => 'Nombre del cliente',
                    'price' => 'Precio',
                ],
            ]
        ],
        'sales' => [
            'main_title' => 'Ventas mensuales',
            'title' => 'Ventas totales',
        ],
    ]
];
