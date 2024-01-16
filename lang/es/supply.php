<?php

return [
    'statuses' => [
        'new' => 'Nuevo',
        'in_process' => 'Bajo procesamiento',
        'on_delivery' => 'Entregando',
        'delivered' => 'Entregado',
        'canceled' => 'Cancelado',
    ],
    'title' => 'Abastecimiento',
    'index' => [
        'title' => 'Abastecimiento',
        'table' => [
            'title' => 'Lista de referencia',
            'cols' => [
                'product_name' => 'Nombre del producto',
                'product_id' => 'ID del Producto',
                'measures' => 'Medidas',
                'length' => 'Longitud de las piernas',
                'unit_of_measurement' => 'Unidad de medida',
                'sale_price' => 'Precio de venta',
                'purchase_price' => 'Precio de compra',
                'quantity' => 'Cantidad',
                'manufacturer_availability' => 'Aprovechar. Productor'
            ],
            'footer' => [
                'cart_total' => 'Total del carrito',
                'review_order' => 'Revisar orden'
            ]
        ],
        'filter' => [
            'prices' => 'Seleccionar precio',
            'availabilities' => 'Selecciona disponibilidad',
        ],
    ],
    'purchases' => [
        'index' => [
            'title' => 'Lista de compras',
            'table' => [
                'title' => 'Adquisiciones',
                'cols' => [
                    'order_number' => 'Número de orden',
                    'order_date' => 'Fecha de orden',
                    'total' => 'Cantidad',
                    'status' => 'Estado',
                    'reseller' => 'Distribuidor',
                ],
                'trashed' => 'Eliminado'
            ],
            'filter' => [
                'status' => 'Seleccione estado',
                'date' => 'Seleccione fecha',
                'select_order_date' => 'Seleccione la fecha del pedido'
            ],
        ],
        'show' => [
            'title' => 'Detalle de compra',
            'table' => [
                'title' => 'Lista de suministros',
                'cols' => [
                    'name' => 'Nombre del producto',
                    'id' => 'ID del Producto',
                    'price' => 'Precio',
                    'quantity' => 'Cantidad',
                    'total' => 'Total por cantidad',
                ],
            ],
            'top_bar' => [
                'order_number' => 'Número de orden',
            ],
            'boxes' => [
                'reseller_data' => 'Datos del revendedor',
                'shipping_data' => 'Datos de envio',
                'billing_data' => 'Datos de facturación',
                'payment_data' => 'Información del pago',
                'payment_method' => 'Método de pago',
            ],
            'alert' => [
                'changing_status' => [
                    'delivered' => '¿Estás seguro de que estás marcando el pedido como entregado? La operación no se puede cancelar.',
                    'canceled' => '¿Estás seguro de que deseas cancelar el pedido? La operación no se puede cancelar.',
                ],
            ],
            'supply_date' => 'Fecha de adquisición',
            'ship_date' => 'Fecha de envío',
            'supply_total' => 'Orden de suministro total',
            'supply_state' => 'Estado del pedido',

        ],
    ],
    'recap' => [
        'title' => 'Resumen del pedido',
        'table' => [
            'title' => 'Productos',
            'cols' => [
                'product_name' => 'Nombre del producto',
                'measures' => 'Medidas',
                'purchase_price' => 'Precio de compra',
                'quantity' => 'Cantidad',
                'total' => 'Total',
            ],
        ],
        'order_review' => [
            'order' => [
                'title' => 'Orden total',
                'subtotal' => 'Total parcial',
                'shipping_cost' => 'Costo de envío',
                'vat' => 'IVA',
                'total' => 'Total'
            ],
            'shipping' => [
                'title' => 'Datos de envío',
                'receiver' => 'Recipiente',
                'address' => 'DIRECCIÓN',
                'phone' => 'Teléfono',
                'email' => 'Correo electrónico',
                'warning' => [
                    'missing_shipping_address' => 'Falta dirección de envío.',
                    'cta' => '¡Añádelo ahora!',
                ]
            ],
            'payment' => [
                'title' => 'Pago',
            ],
            'confirm' => 'Confirmar pedido'
        ],
    ],
];
