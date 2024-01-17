<?php

return [
    'title' => 'registro de clientes',
    'index' => [
        'title' => 'registro de clientes',
        'table' => [
            'title' => 'Clientela',
            'cols'  => [
                'name'              => 'Nombre del cliente',
                'email'             => 'Dirección de correo electrónico',
                'reseller'          => 'Distribuidor',
                'registration_date' => 'Fecha de Registro',
                'last_order_date'   => 'Fecha del último pedido',
            ],
        ],
        'filter' => [
            'select_registration_date' => 'Seleccione la fecha de registro',
        ],
    ],
    'show' => [
        'title' => 'perfil de cliente',
        'data'  => [
            'title'             => 'Datos de los clientes',
            'firstname'         => 'Nombre de pila:',
            'lastname'          => 'Apellido:',
            'email'             => 'Correo electrónico:',
            'registration_date' => 'Fecha de Registro:',
            'address'           => 'DIRECCIÓN:',
            'city'              => 'Ciudad:',
            'postcode'          => 'Código Postal:',
            'country'           => 'Aldea:',
        ],
        'orders' => [
            'title' => 'Resumen del pedido',
        ],
    ],
    'edit' => [
        'title' => 'Editar cliente',
        'titles' => [
            'general_data' => 'Informacion General',
            'billing_data' => 'Información de facturación',
            'shipping_data' => 'Datos de envio',
            'payment' => 'Pago',
        ],
        'firstname' => [
            'label' => 'Nombre',
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
            'label' => 'CÓDIGO POSTAL',
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
        'addresses' => [
            'shipping' => 'Dirección de envío',
            'billing' => 'Dirección de Envio'
        ],
    ],
    'profile' => 'Perfil',
    'profile_description' => 'Vea sus datos, configuración de inicio de sesión y contraseña, sus pedidos.',
    'tabs' => [
        'personal_data' => [
            'title' => 'Información personal',
            'user' => 'Editar usuario',
            'email' => 'Editar correo electrónico',
            'password' => 'Cambiar la contraseña'
        ],
        'addresses' => [
            'title' => 'Direcciones',
            'address' => 'Editar direcciones'
        ],
        'orders' => [
            'title' => 'Pedidos',
            'order' => 'Pedidos',
            'status' => [
                'paid' => 'Orden confirmada',
                'in_process' => 'Bajo procesamiento',
                'in_shipping' => 'En tránsito',
                'shipped' => 'Enviado',
                'delivered' => 'Entregado',
                'refunded' => 'Reintegrado',
                'canceled' => 'eliminado'
            ]
        ],
    ],
    'edit_data' => 'Eliminado',
    'password' => 'Contraseña',
    'format_password' => [
        'uppercase' => 'Un carácter en mayúscula',
        'lowercase' => 'Un carácter en minúscula',
        'number' => 'Un número',
        'length' => '8 caracteres',
        'special_character' => 'Un carácter especial (&*€%)'
    ],
    'buttons' => [
        'cancel' => 'Cancelar',
        'save' => 'Ahorrar',
        'copy_shipping' => 'Como dirección de envío',
        'back' => 'Hacia atrás',
    ]
];
