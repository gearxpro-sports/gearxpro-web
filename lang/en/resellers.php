<?php

return [
    'title' => 'Retailers',
    'index' => [
        'title' => 'Retailers',
        'table' => [
            'title' => 'Retailers',
            'cols' => [
                'company' => 'Company name',
                'email' => 'E-mail',
                'country' => 'Nation',
                'creation_date' => 'Creation date',
                'last_login_date' => 'Last Access Date',
            ],
            'disabled' => 'Disabled',
        ],
        'filter' => [
            'select_registration_date' => 'Select Registration Date',
        ],
    ],
    'create' => [
        'title' => 'Create Reseller',
        'titles' => [
            'general_data' => 'General data',
            'billing_data' => 'Billing information',
            'shipping_data' => 'Shipping data',
            'tax' => 'Taxation',
            'payment' => 'Payment',
            'stripe_account' => 'Stripe Accounts'
        ],
        'firstname' => [
            'label' => 'First name',
        ],
        'lastname' => [
            'label' => 'Last name',
        ],
        'email' => [
            'label' => 'Email',
        ],
        'company' => [
            'label' => 'Company name',
        ],
        'address' => [
            'label' => 'Address',
        ],
        'civic' => [
            'label' => 'Civic',
        ],
        'city' => [
            'label' => 'City',
        ],
        'postcode' => [
            'label' => 'ZIP code',
        ],
        'country' => [
            'label' => 'State',
            'hint' => 'Select your country'
        ],
        'vat_number' => [
            'label' => 'TAX code',
        ],
        'tax_code' => [
            'label' => 'Fiscal code',
        ],
        'phone' => [
            'label' => 'Phone number',
        ],
        'sdi' => [
            'label' => 'SDI code',
        ],
        'pec' => [
            'label' => 'Email PEC',
        ],
        'payment_method' => [
            'label' => 'Payment method',
        ],
        'tax' => [
            'label' => 'VAT %',
        ],
        'stripe_public_key' => [
            'label' => 'Public key',
        ],
        'stripe_private_key' => [
            'label' => 'Private key',
        ],
    ],
    'show' => [
        'titles' => [
            'data' => 'Reseller data',
            'billing' => 'Billing information',
            'shipping' => 'Shipping data',
            'payment' => 'Payment method'
        ],
        'data' => [
            'company' => 'Company name:',
            'lastname' => 'Surname:',
            'email' => 'E-mail:',
            'creation_date' => 'Creation date:',
            'last_login' => 'Last Access:',
            'address' => 'Address:',
            'city' => 'City:',
            'postcode' => 'Postal Code:',
            'country' => 'Nation:',
        ],
        'orders' => [
            'title' => 'Order Summary',
        ],
    ],
    'edit' => [
        'title' => 'Edit Reseller',
    ],
    'disable' => [
        'title' => 'Are you sure you want to disable this Reseller?',
        'confirm' => 'Disable'
    ],
    'enable' => [
        'title' => 'SAre you sure you want to enable this Reseller?',
        'already_exist' => "There is currently another Reseller linked to the nation ':country'.<br>By enabling this Reseller, you will disable the other one!",
        'confirm' => 'Enable'
    ],
    'missing_data_modal' => [
        'title' => 'Complete the profile',
        'intro' => 'Before continuing, fill in and confirm the following data:',
    ],
];
