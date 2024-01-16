<?php

use App\Models\Order;

return [
    'statuses' => [
        Order::PAID_STATUS => 'Paid',
        Order::IN_PROCESS_STATUS => 'Under processing',
        Order::IN_SHIPPING_STATUS => 'In shipping',
        Order::SHIPPED_STATUS => 'Shipped',
        Order::DELIVERED_STATUS => 'Delivered',
        Order::CANCELED_STATUS => 'Deleted',
        Order::REFUNDED_STATUS => 'Refunded',
    ],
    'title' => 'Order management',
    'index' => [
        'title' => 'Order management',
        'table' => [
            'title' => 'Orders',
            'cols' => [
                'order_number' => 'Order number',
                'order_date' => 'Order date',
                'customer' => 'Client\'s name',
                'total' => 'Total �',
                'status' => 'Order Status',
            ],
        ],
        'filter' => [
            'status' => 'Select state',
            'date' => 'Select date',
        ],
        'status_switcher' => [
            'selected_items' => 'Selected items:',
            'deselect_all' => 'Deselect everything',
            'change_state' => 'Change State:',
        ],
    ],
    'show' => [
        'title' => 'Order Details',
        'table' => [
            'title' => 'Products Purchased',
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
            'customer_data' => 'Customer data',
            'shipping_data' => 'Shipping data',
            'billing_data' => 'Billing data',
            'payment_data' => 'Payment Information',
            'payment_method' => 'Payment method',
        ],
        'alert' => [
            'changing_status' => [
                Order::SHIPPED_STATUS => 'Are you sure you are marking the order as shipped? The operation cannot be cancelled.',
                Order::DELIVERED_STATUS => 'Are you sure you are marking the order as delivered? The operation cannot be cancelled.',
                Order::CANCELED_STATUS => 'Are you sure you want to cancel the order? The operation cannot be cancelled.',
                Order::REFUNDED_STATUS => 'Are you sure you want to mark the order as refunded? The operation cannot be cancelled.',
            ],
        ],
        'order_date' => 'Order date',
        'ship_date' => 'Shipping Date',
        'order_total' => 'Total order',
        'order_state' => 'Order Status',
        'summary' => [
            'subtotal' => 'Subtotal',
            'shipping_costs' => 'Shipping',
            'tax' => 'VAT',
            'total' => 'Total (Euro):',
        ],
        'shipping_details' => 'Shipping details',
        'stripe_receipt' => 'View Stripe payment receipt',
    ],
];
