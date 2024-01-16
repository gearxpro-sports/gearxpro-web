<?php

return [
    'title' => 'Minoristas',
    'index' => [
        'title' => 'Minoristas',
        'table' => [
            'title' => 'Minoristas',
            'cols' => [
                'company' => 'Nombre de empresa',
                'email' => 'Correo electrónico',
                'country' => 'Nación',
                'creation_date' => 'Fecha de creación',
                'last_login_date' => 'Fecha del último acceso',
            ],
            'disabled' => 'Desactivado',
        ],
        'filter' => [
            'select_registration_date' => 'Seleccione la fecha de registro',
        ],
    ],
    'create' => [
        'title' => 'Crear revendedor',
        'titles' => [
            'general_data' => 'Informacion General',
            'billing_data' => 'Información de facturación',
            'shipping_data' => 'Datos de envio',
            'tax' => 'Impuestos',
            'payment' => 'Pago',
            'stripe_account' => 'Account Stripe'
        ],
        'firstname' => [
            'label' => 'Nombre de pila',
        ],
        'lastname' => [
            'label' => 'Apellido',
        ],
        'email' => [
            'label' => 'Correo electrónico',
        ],
        'company' => [
            'label' => 'Nombre del Negocio',
        ],
        'address' => [
            'label' => 'DIRECCIÓN',
        ],
        'city' => [
            'label' => 'Ciudad',
        ],
        'postcode' => [
            'label' => 'Código Postal',
        ],
        'country' => [
            'label' => 'Nación',
            'hint' => 'Selecciona tu pais'
        ],
        'vat_number' => [
            'label' => 'Número de valor agregado',
        ],
        'tax_code' => [
            'label' => 'Código de identificación fiscal',
        ],
        'phone' => [
            'label' => 'Teléfono',
        ],
        'sdi' => [
            'label' => 'código IDE',
        ],
        'pec' => [
            'label' => 'correo electrónico PEC',
        ],
        'payment_method' => [
            'label' => 'Método de pago',
        ],
        'tax' => [
            'label' => 'IVA %',
        ],
        'stripe_public_key' => [
            'label' => 'Llave pública',
        ],
        'stripe_private_key' => [
            'label' => 'Llave privada',
        ],
    ],
    'show' => [
        'titles' => [
            'data' => 'Datos del distribuidor',
            'billing' => 'Información de facturación',
            'shipping' => 'Datos de envio',
            'payment' => 'Método de pago'
        ],
        'data' => [
            'company' => 'Nombre de empresa:',
            'lastname' => 'Apellido:',
            'email' => 'Correo electrónico:',
            'creation_date' => 'Fecha de creación:',
            'last_login' => 'Ultimo acceso:',
            'address' => 'DIRECCIÓN:',
            'city' => 'Ciudad:',
            'postcode' => 'Código Postal:',
            'country' => 'Nación:',
        ],
        'orders' => [
            'title' => 'Resumen del pedido',
        ],
    ],
    'edit' => [
        'title' => 'Editar distribuidor',
    ],
    'disable' => [
        'title' => '¿Está seguro de que desea desactivar este revendedor?',
        'confirm' => 'Desactivar'
    ],
    'enable' => [
        'title' => '¿Está seguro de que desea habilitar este revendedor?',
        'already_exist' => "Actualmente hay otro revendedor vinculado a la nación ':country'.<br>¡Al habilitar este revendedor, deshabilitarás el otro!",
        'confirm' => 'Capacidad'
    ],
    'missing_data_modal' => [
        'title' => 'Completa el perfil',
        'intro' => 'Antes de continuar, rellene y confirme los siguientes datos:',
    ],
];
