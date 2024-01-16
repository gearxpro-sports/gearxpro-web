<?php

return [
    'statuses' => [
        'new' => 'New',
        'in_process' => 'Under processing',
        'on_delivery' => 'Delivering',
        'delivered' => 'Delivered',
        'canceled' => 'Canceled',
    ],
    'title' => 'Supplying',
    'index' => [
        'title' => 'Supplying',
        'table' => [
            'title' => 'Reference List',
            'cols' => [
                'product_name' => 'Product name',
                'product_id' => 'Product ID',
                'measures' => 'Measures',
                'length' => 'Leg length',
                'unit_of_measurement' => 'Unit of measure',
                'sale_price' => 'Selling price',
                'purchase_price' => 'Purchase Price',
                'quantity' => 'Amount',
                'manufacturer_availability' => 'Avail. Producer'
            ],
            'footer' => [
                'cart_total' => 'Cart total',
                'review_order' => 'Review Order'
            ]
        ],
        'filter' => [
            'prices' => 'Select price',
            'availabilities' => 'Select availability',
        ],
    ],
    'purchases' => [
        'index' => [
            'title' => 'Purchase List',
            'table' => [
                'title' => 'Acquisitions',
                'cols' => [
                    'order_number' => 'Order number',
                    'order_date' => 'Order date',
                    'total' => 'Amount',
                    'status' => 'State',
                    'reseller' => 'Reseller',
                ],
                'trashed' => 'Deleted'
            ],
            'filter' => [
                'status' => 'Select state',
                'date' => 'Select date',
                'select_order_date' => 'Select Order Date'
            ],
        ],
        'show' => [
            'title' => 'Purchase detail',
            'table' => [
                'title' => 'Supply List',
                'cols' => [
                    'name' => 'Product name',
                    'id' => 'Product ID',
                    'price' => 'Price',
                    'quantity' => 'Amount',
                    'total' => 'Total by Quantity',
                ],
            ],
            'top_bar' => [
                'order_number' => 'Order number',
            ],
            'boxes' => [
                'reseller_data' => 'Reseller Data',
                'shipping_data' => 'Shipping data',
                'billing_data' => 'Billing data',
                'payment_data' => 'Payment Information',
                'payment_method' => 'Payment method',
            ],
            'alert' => [
                'changing_status' => [
                    'delivered' => 'Are you sure you are marking the order as delivered? The operation cannot be cancelled.',
                    'canceled' => 'Are you sure you want to cancel the order? The operation cannot be cancelled.',
                ],
            ],
            'supply_date' => 'Procurement Date',
            'ship_date' => 'Shipping Date',
            'supply_total' => 'Total Supply Order',
            'supply_state' => 'Order Status',

        ],
    ],
    'recap' => [
        'title' => 'Order Summary',
        'table' => [
            'title' => 'Products',
            'cols' => [
                'product_name' => 'Product name',
                'measures' => 'Measures',
                'purchase_price' => 'Purchase Price',
                'quantity' => 'Amount',
                'total' => 'Total',
            ],
        ],
        'order_review' => [
            'order' => [
                'title' => 'Total order',
                'subtotal' => 'Subtotal',
                'shipping_cost' => 'Shipping Cost',
                'vat' => 'VAT',
                'total' => 'Total'
            ],
            'shipping' => [
                'title' => 'Shipping info',
                'receiver' => 'Recipient',
                'address' => 'Address',
                'phone' => 'Telephone',
                'email' => 'E-mail',
                'warning' => [
                    'missing_shipping_address' => 'Missing shipping address.',
                    'cta' => 'Add it now!',
                ]
            ],
            'payment' => [
                'title' => 'Payment',
            ],
            'confirm' => 'Confirm order'
        ],
    ],
];
