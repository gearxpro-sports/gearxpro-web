<?php

return [
    'title' => 'Productos',
    'stock' => [
        'in_stock' => 'Disponible',
        'out_of_stock' => 'No disponible',
    ],
    'index' => [
        'title' => 'Productos',
        'add_product_modal_title' => 'Crear producto',
        'table' => [
            'title' => 'Productos',
            'cols'  => [
                'id'   => 'IDENTIFICACIÓN',
                'name' => 'Nombre del producto',
            ],
        ],
        'alert' => [
            'delete_product' => '¿Estás seguro de que deseas eliminar este producto?'
        ],
    ],
    'edit' => [
        'title' => 'Editar',
        'categories_title' => 'Categorías',
        'tabs' => [
            'main'           => 'Información',
            'options'        => 'Opciones',
            'locale'         => 'Ubicación',
            'images'         => 'Imágenes',
            'main_desc'      => 'Producto',
            'features_desc'  => 'Características',
            'pros_desc'      => 'Ventajas',
            'technical_desc' => 'Tecnicismo',
            'washing_desc'   => 'Instrucciones de lavado',
        ],
        'languages' => [
            'translate_all_fields_from' => 'Traducir todos los campos de :lang',
            'confirm_translation' => '¿Confirmas esta operación? Se sobrescribirán las traducciones anteriores.',
            'translations_in_progress' => 'Traducción en progreso...',
        ],
        'section' => [
            'locale' => [
                'title' => 'Ubicación',
                'price_description' => 'Para que este producto esté disponible durante la fase de adquisición y venta, se deben ingresar ambos precios.',
                'wholesale_price' => [
                    'label' => 'Precio de compra (B2B)',
                ],
                'price' => [
                    'label' => 'Precio de venta (B2C)',
                ],
            ],
            'main' => [
                'name' => [
                    'label' => 'Nombre del producto',
                ],
                'slug' =>[
                    'label' => 'URL amigable',
                    'action' => 'Genere el slug usando el nombre del producto ingresado',
                ],
                'main_desc' =>[
                    'placeholder' => 'Descripción del Producto...',
                ],
                'features_desc' =>[
                    'placeholder' => 'Descripción Características...',
                ],
                'pros_desc' =>[
                    'placeholder' => 'Descripción Ventajas...',
                ],
                'technical_desc' =>[
                    'placeholder' => 'Descripción Tecnicismo...',
                ],
                'washing_desc' =>[
                    'placeholder' => 'Descripción Instrucciones de lavado...',
                ],
                'meta_title' => [
                    'label' => 'Título SEO',
                ],
                'meta_description' => [
                    'label' => 'Descripción SEO',
                ],
                'descriptons_label' => 'Descripciones',
            ],
            'options' => [
                'generate_variants' => 'Generar variaciones',
                'edit_variant_modal_title' => 'Editar variante',
                'attributes_title' => 'Atributos',
                'product_variants_title' => 'Lista de variantes',
                'sku' => [
                    'label' => 'Codigo interno',
                ],
                'barcode' => [
                    'label' => 'Código de barras',
                ],
                'quantity' => [
                    'label' => 'Cantidad',
                ],
                'alert' => [
                    'confirm_variant_delete' => '¿Está seguro de que desea eliminar esta variante?',
                    //'confirm_switch_to_simple_product' => 'Confermi di passare a prodotto semplice? Al salvataggio del prodottto perderai tutte le varianti impostate precedentemente!',
                ],
                'errors' => [
                    'variant_form' => 'Se produjo un error al guardar la variante.',
                ],
            ],
            'images' => [

            ]
        ],
    ],
];
