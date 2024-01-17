<?php

use App\Models\Order;

return [
    'statuses' => [
        Order::PAID_STATUS => 'Pagado',
        Order::IN_PROCESS_STATUS => 'Bajo procesamiento',
        Order::IN_SHIPPING_STATUS => 'En envío',
        Order::SHIPPED_STATUS => 'Enviado',
        Order::DELIVERED_STATUS => 'Entregado',
        Order::CANCELED_STATUS => 'Eliminado',
        Order::REFUNDED_STATUS => 'Reintegrado',
    ],
    'title' => 'Gestión de pedidos',
    'index' => [
        'title' => 'Gestión de pedidos',
        'table' => [
            'title' => 'Pedidos',
            'cols' => [
                'order_number' => 'Número de orden',
                'order_date' => 'Fecha de orden',
                'customer' => 'Nombre del cliente',
                'total' => '€ totales',
                'status' => 'Estado del pedido',
            ],
        ],
        'filter' => [
            'status' => 'Seleccione estado',
            'date' => 'Seleccione fecha',
        ],
        'status_switcher' => [
            'selected_items' => 'Artículos seleccionados:',
            'deselect_all' => 'Deseleccionar todo',
            'change_state' => 'Cambian de estado:',
        ],
    ],
    'show' => [
        'title' => 'Detalles del pedido',
        'table' => [
            'title' => 'Productos comprados',
            'cols' => [
                'name' => 'Nombre del producto',
                'id' => 'ID del Producto',
                'price' => 'Precio',
                'quantity' => 'Cantidad',
                'total' => 'Total por cantidad',
            ],
        ],
        'top_bar' => [
            'order_number' => 'Numero de orden',
        ],
        'boxes' => [
            'customer_data' => 'Datos de los clientes',
            'shipping_data' => 'Datos de envio',
            'billing_data' => 'Datos de facturación',
            'payment_data' => 'Información del pago',
            'payment_method' => 'Metodo de pago',
        ],
        'alert' => [
            'changing_status' => [
                Order::SHIPPED_STATUS => '¿Está seguro de que está marcando el pedido como enviado? La operación no se puede cancelar.',
                Order::DELIVERED_STATUS => '¿Estás seguro de que estás marcando el pedido como entregado? La operación no se puede cancelar.',
                Order::CANCELED_STATUS => '¿Estás seguro de que deseas cancelar el pedido? La operación no se puede cancelar.',
                Order::REFUNDED_STATUS => '¿Estás seguro de que deseas marcar el pedido como reembolsado? La operación no se puede cancelar.',
            ],
        ],
        'order_date' => 'Fecha de orden',
        'ship_date' => 'Fecha de envo',
        'order_total' => 'Orden total',
        'order_state' => 'Estado del pedido',
        'summary' => [
            'subtotal' => 'Total parcial',
            'shipping_costs' => 'Envo',
            'tax' => 'IVA',
            'total' => 'Total (euros):',
        ],
        'shipping_details' => 'Detalles de envo',
        'stripe_receipt' => 'Ver recibo de pago de Stripe',
    ],
];
