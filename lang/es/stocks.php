<?php

return [
    'title' => 'Depósito',
    'index' => [
        'title' => 'Depósito',
        'table' => [
            'title' => 'productos de almacén',
            'cols'  => [
                'product'    => 'Nombre del producto',
                'sku'        => 'IID del Producto',
                'measures'   => 'Unidad de medida',
                'quantity'   => 'Cantidad',
                'sale_price' => 'Precio de venta',
            ],
        ],
        'filter' => [
            'select_registration_date' => 'Seleccione la fecha de registro',
        ],
    ],
    'modals' => [
        'edit-quantity' => [
            'title' => 'Editar cantidad en stock',
            'update' => 'Actualizar'
        ],
    ]
];
