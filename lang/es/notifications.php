<?php

return [
    'titles' => [
        'saving' => 'Creación',
        'updating' => 'Actualizar',
        'deleting' => 'Cancelación',
        'adding' => 'Suma'
    ],
    'actions' => [
        'show' => 'Verás',
        'close' => 'Cerca',
    ],
    'profile' => [
        'updating' => [
            'success' => '¡Tú perfil ha sido actualizado satisfactoriamente!',
            'error' => '¡Error al actualizar el perfil!',
        ],
    ],
    'customers' => [
        'saving' => [
            'success' => '¡El cliente ha sido creado exitosamente!',
            'error' => '¡Error al guardar al cliente!',
        ],
        'updating' => [
            'success' => '¡El cliente ha sido actualizado exitosamente! ¡El cliente ha sido actualizado exitosamente!',
            'error' => '¡Error al actualizar el cliente!',
        ],
        'deleting' => [
            'success' => '¡El cliente fue eliminado exitosamente!',
            'error' => '¡Error al eliminar cliente!',
        ],
    ],
    'resellers' => [
        'saving' => [
            'success' => '¡El revendedor ha sido creado exitosamente!',
            'error' => '¡Error al guardar distribuidor!',
        ],
        'updating' => [
            'success' => '¡El revendedor se ha actualizado correctamente!',
            'error' => '¡Error al actualizar el distribuidor!',
        ],
        'deleting' => [
            'success' => '¡El revendedor ha sido eliminado exitosamente!',
            'error' => '¡Error al eliminar el revendedor!',
        ],
        'updating_missing_data' => [
            'success' => '¡Datos de perfil actualizados exitosamente!',
            'error' => '¡Error al actualizar los datos del perfil!',
        ],
    ],
    'products' => [
        'saving' => [
            'success' => '¡El producto fue creado exitosamente!',
            'error' => '¡Error al guardar el producto!',
        ],
        'updating' => [
            'success' => '¡El producto se ha actualizado correctamente!',
            'error' => '¡Error al actualizar el producto!',
        ],
        'deleting' => [
            'success' => '¡El producto se eliminó exitosamente!',
            'error' => '¡Error al eliminar el producto!',
        ],
    ],
    'product_variants' => [
        'saving' => [
            'success' => '¡Las variaciones se han creado con éxito!',
            'error' => '¡Error al guardar variantes!',
        ],
        'updating' => [
            'success' => '¡Las variantes se han actualizado con éxito!',
            'error' => '¡Error al actualizar variantes!',
        ],
        'deleting' => [
            'success' => '¡La variante fue eliminada con éxito!',
            'error' => '¡Error al eliminar la variante!',
        ],
    ],
    'categories' => [
        'saving' => [
            'success' => '¡La categoría fue creada exitosamente!',
            'error' => '¡Error al guardar categoría!',
        ],
        'updating' => [
            'success' => '¡La categoría se ha actualizado correctamente!',
            'error' => '¡Error al actualizar la categoría!',
            'children_success' => '¡La lista de subcategorías se ha actualizado correctamente!'
        ],
        'deleting' => [
            'success' => '¡La categoría se ha eliminado correctamente!',
            'error' => '¡Error al eliminar la categoría!',
        ],
    ],
    'supply' => [
        'adding' => [
            'success' => '¡El producto ha sido agregado exitosamente!'
        ],
        'status_changed' => [
            'success' => 'El estado del pedido se ha cambiado correctamente.',
            'error' => 'No es posible cambiar el estado del pedido.',
        ]
    ],
    'customer' => [
        'error' => [
            'password' => [
                'title' => 'contraseña incorrecta',
                'description' => 'La contraseña debe cumplir con el formato requerido.'
            ],
            'address' => [
                'title' => 'Dirección inválida',
                'description' => '¡Asegúrese de que la dirección ingresada sea correcta e incluya el número de la casa!'
            ]
        ],
        'success' => [
            'password' => [
                'title' => 'Contraseña cambiada con éxito',
            ],
        ]
    ],
    'orders' => [
        'statuses_changed' => [
            'success' => 'Los estados de los pedidos seleccionados se han cambiado correctamente.',
            'error' => 'No es posible cambiar los estados de los pedidos seleccionados.',
        ],
        'status_changed' => [
            'success' => 'El estado del pedido se ha cambiado correctamente.',
            'error' => 'No es posible cambiar el estado del pedido.',
        ]
    ],
    'countries' => [
        'updating_reseller' => [
            'success' => 'Revendedor actualizado exitosamente',
            'error' => 'No es posible actualizar el revendedor.',
        ],
    ],
];
