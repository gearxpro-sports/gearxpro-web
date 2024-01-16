<?php

return [
    'login' => [
        'title' => 'Acceso',
        'description' => 'Ingrese sus credenciales para iniciar sesión.',
        'email' => [
            'label'       => 'Correo electrónico',
            'placeholder' => 'Inicia sesión con tu correo electrónico',
        ],
        'password' => [
            'label'       => 'Contraseña',
            'placeholder' => 'Ingresa tu contraseña',
            'forgetLink'  => '¿Has olvidado tu contraseña?',
        ],
        'rememberme' => [
            'label' => 'Acuérdate de mí',
        ],
        'submit' => 'Acceso',
    ],
    'forget_password' => [
        'title' => 'recupera tu contraseña',
        'description' => 'Ingresa tu correo electrónico y te enviaremos instrucciones para restablecer tu contraseña',
        'email' => [
            'label'       => 'Correo electrónico',
            'placeholder' => 'Introduce tu correo electrónico',
        ],
        'submit' => 'recupera tu contraseña',
    ],
    'reset_password' => [
        'title' => 'Restablecer su contraseña',
        'description' => 'Introduce tu correo electrónico y tu nueva contraseña',
        'email' => [
            'label'       => 'Correo electrónico',
            'placeholder' => 'Introduce tu Correo electrónico',
        ],
        'password' => [
            'label'       => 'Nueva contraseña',
            'placeholder' => 'Introduzca su nueva contraseña',
        ],
        'password_confirmation' => [
            'label'       => 'Confirmar contraseña',
            'placeholder' => 'Vuelva a ingresar su nueva contraseña para confirmar',
        ],
        'submit' => 'Restablecer la contraseña',
    ],
    'profile' => [
        'update_password' => [
            'title' => 'Actualiza tu contraseña',
            'subtitle' => 'Asegúrate de que tu contraseña sea segura',
            'fields' => [
                'current_password' => 'Contraseña actual',
                'new_password' => 'Nueva contraseña',
                'confirm_password' => 'Confirmar la contraseña',
            ]
        ],
        'delete_account' => [
            'title' => 'Borrar cuenta',
            'subtitle' => 'Si elimina su cuenta, todos los datos y configuraciones se eliminarán permanentemente. Antes de eliminar su cuenta, asegúrese de haber guardado la configuración de su cuenta.',
            'button' => 'Borrar cuenta',
            'modal' => [
                'title' => '¿Estás seguro de que quieres eliminar tu cuenta?',
                'subtitle' => 'Si elimina su cuenta, todos los datos y configuraciones se eliminarán permanentemente. Ingrese su contraseña para continuar con la eliminación de su cuenta.',
                'button' => 'Borrar cuenta'
            ]
        ],
    ],
    'messages' => [
        'failed'   => 'Credenciales incorrectas.',
        'password' => 'Contraseña incorrecta',
        'throttle' => 'Demasiados intentos de inicio de sesión. Inténtelo de nuevo en :seconds segundos.',
    ]
];
