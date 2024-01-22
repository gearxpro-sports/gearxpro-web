<?php

return [
    'title' => 'Products',
    'stock' => [
        'in_stock' => 'Available',
        'out_of_stock' => 'Not available',
    ],
    'index' => [
        'title' => 'Products',
        'add_product_modal_title' => 'Create Product',
        'table' => [
            'title' => 'Products',
            'cols'  => [
                'id'   => 'ID',
                'name' => 'Product name',
            ],
        ],
        'alert' => [
            'delete_product' => 'Are you sure you want to delete this product?'
        ],
    ],
    'edit' => [
        'title' => 'Edit',
        'categories_title' => 'Categories',
        'tabs' => [
            'main'           => 'Informations',
            'options'        => 'Options',
            'locale'         => 'Location',
            'images'         => 'Images',
            'main_desc'      => 'Product',
            'features_desc'  => 'Characteristics',
            'pros_desc'      => 'Advantages',
            'technical_desc' => 'Technicality',
            'washing_desc'   => 'Washing instructions',
        ],
        'languages' => [
            'translate_all_fields_from' => 'Translate all fields from :lang',
            'confirm_translation' => 'Do you confirm this operation? Previous translations will be overwritten.',
            'translations_in_progress' => 'Translation in progress...',
        ],
        'section' => [
            'locale' => [
                'title' => 'Location',
                'price_description' => 'To make this product available during the procurement and sales phase, both prices must be entered.',
                'wholesale_price' => [
                    'label' => 'Purchase price (B2B)',
                ],
                'price' => [
                    'label' => 'Selling price (B2C)',
                ],
            ],
            'main' => [
                'name' => [
                    'label' => 'Product name',
                ],
                'slug' =>[
                    'label' => 'Friendly Url',
                    'action' => 'Generate the slug using the product name entered',
                ],
                'main_desc' =>[
                    'placeholder' => 'Product description...',
                ],
                'features_desc' =>[
                    'placeholder' => 'Description Features...',
                ],
                'pros_desc' =>[
                    'placeholder' => 'Description Advantages...',
                ],
                'technical_desc' =>[
                    'placeholder' => 'Description Technicality...',
                ],
                'washing_desc' =>[
                    'placeholder' => 'Description Washing instructions...',
                ],
                'meta_title' => [
                    'label' => 'SEO Title',
                ],
                'meta_description' => [
                    'label' => 'SEO Description',
                ],
                'descriptons_label' => 'Descriptions',
            ],
            'options' => [
                'generate_variants' => 'Generate variations',
                'edit_variant_modal_title' => 'Edit variant',
                'attributes_title' => 'Attributes',
                'product_variants_title' => 'List of variants',
                'sku' => [
                    'label' => 'Internal code',
                ],
                'barcode' => [
                    'label' => 'Barcode',
                ],
                'quantity' => [
                    'label' => 'Amount',
                ],
                'alert' => [
                    'confirm_variant_delete' => 'Are you sure you want to delete this variant?',
                    //'confirm_switch_to_simple_product' => 'Confermi di passare a prodotto semplice? Al salvataggio del prodottto perderai tutte le varianti impostate precedentemente!',
                ],
                'errors' => [
                    'variant_form' => 'An error occurred while saving the variant.',
                ],
            ],
            'images' => [

            ]
        ],
    ],
];
