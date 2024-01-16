<?php

return [
    'title' => 'Categorías',
    'index' => [
        'title' => 'Categorías',
        'table' => [
            'title' => 'Categorías',
            'cols'  => [
                'id'   => 'IDENTIFICACIÓN',
                'name' => 'Nombre de pila',
            ],
        ],
    ],
    'create' => [
        'title' => 'Crear nueva categoría',
        'name' => [
            'label' => 'Nombre de pila',
        ],
    ],
    'edit' => [
        'title' => 'Editar categoria',
        'child_categories_title' => 'Subcategorías',
        'child_categories_modal_title' => 'Crear subcategoría',
        'parent_link' => 'Categoría principal',
        'name' => [
            'label' => 'Nombre de pilae',
        ],
        'description' => [
            'label' => 'Descripción',
        ],
        'add_existing' => 'Agregar existente',
        'languages' => [
            'translate_all_fields_from' => 'Traducir todos los campos de :lang',
            'confirm_translation' => '¿Confirmas esta operación? Se sobrescribirán las traducciones anteriores.',
            'translations_in_progress' => 'Traducción en progreso...',
        ],
    ],
    'alert' => [
        'delete_category' => '¿Estás seguro de que deseas eliminar esta categoría? También se eliminarán las subcategorías relacionadas.'
    ],
];
