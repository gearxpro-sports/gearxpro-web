<?php

return [
    'title' => 'Customer registry',
    'index' => [
        'title' => 'Customer registry',
        'table' => [
            'title' => 'Clients',
            'cols'  => [
                'name'              => 'Client\'s name',
                'email'             => 'Email address',
                'reseller'          => 'Dealer',
                'registration_date' => 'Registration date',
                'last_order_date'   => 'Last Order Date',
            ],
        ],
        'filter' => [
            'select_registration_date' => 'Select Registration Date',
        ],
    ],
    'show' => [
        'title' => 'Customer profile',
        'data'  => [
            'title'             => 'Customer data',
            'firstname'         => 'First name:',
            'lastname'          => 'Surname:',
            'email'             => 'E-mail:',
            'registration_date' => 'Registration date:',
            'address'           => 'Address:',
            'city'              => 'City:',
            'postcode'          => 'Postal Code:',
            'country'           => 'Village:',
        ],
        'orders' => [
            'title' => 'ROrder Summary',
        ],
    ],
    'edit' => [
        'title' => 'Edit Customer',
        'titles' => [
            'general_data' => 'General data',
            'billing_data' => 'Billing information',
            'shipping_data' => 'Shipping data',
            'payment' => 'Payment',
        ],
        'firstname' => [
            'label' => 'Name',
        ],
        'lastname' => [
            'label' => 'Surname',
        ],
        'email' => [
            'label' => 'E-mail',
        ],
        'company' => [
            'label' => 'Business name',
        ],
        'address' => [
            'label' => 'Address',
        ],
        'city' => [
            'label' => 'City',
        ],
        'postcode' => [
            'label' => 'Postal code',
        ],
        'country' => [
            'label' => 'Country',
            'hint' => 'Select your country'
        ],
        'vat_number' => [
            'label' => 'VAT number',
        ],
        'tax_code' => [
            'label' => 'Tax ID code',
        ],
        'phone' => [
            'label' => 'Telephone',
        ],
        'sdi' => [
            'label' => 'SDI code',
        ],
        'pec' => [
            'label' => 'PEC email',
        ],
        'payment_method' => [
            'label' => 'Payment method',
        ],
        'addresses' => [
            'shipping' => 'Shipping address',
            'billing' => 'Billing address'
        ],
    ],
    'profile' => 'Profile',
    'profile_description' => 'View your data, login and password settings, your orders.',
    'tabs' => [
        'personal_data' => [
            'title' => 'Personal data',
            'user' => 'Edit user',
            'email' => 'Edit Email',
            'password' => 'Change Password'
        ],
        'addresses' => [
            'title' => 'Addresses',
            'address' => 'Edit Addresses'
        ],
        'orders' => [
            'title' => 'Orders',
            'order' => 'Order',
            'status' => [
                'paid' => 'Order confirmed',
                'in_process' => 'Under processing',
                'in_shipping' => 'IIn transit',
                'shipped' => 'Shipped',
                'delivered' => 'Delivered',
                'refunded' => 'Refunded',
                'canceled' => 'Deleted'
            ]
        ],
    ],
    'edit_data' => 'Update',
    'password' => 'Password',
    'format_password' => [
        'uppercase' => 'An uppercase character',
        'lowercase' => 'A lowercase character',
        'number' => 'A number',
        'length' => '8 characters',
        'special_character' => 'A special character (&*€%)'
    ],
    'buttons' => [
        'cancel' => 'Cancel',
        'save' => 'Save',
        'copy_shipping' => 'As shipping address',
        'back' => 'Back',
    ]
];
