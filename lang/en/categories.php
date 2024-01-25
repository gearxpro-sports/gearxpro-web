<?php

return [
    'title' => 'Categories',
    'index' => [
        'title' => 'Categories',
        'table' => [
            'title' => 'Categories',
            'cols'  => [
                'id'   => 'ID',
                'name' => 'First name',
            ],
        ],
    ],
    'create' => [
        'title' => 'Create new category',
        'name' => [
            'label' => 'First name',
        ],
    ],
    'edit' => [
        'title' => 'Edit category',
        'child_categories_title' => 'Subcategories',
        'child_categories_modal_title' => 'Create Subcategory',
        'parent_link' => 'Parent category',
        'name' => [
            'label' => 'First name',
        ],
        'description' => [
            'label' => 'Description',
        ],
        'size_guide' => [
            'title' => 'Size guide',
            'subtitle' => 'Select which tables to display in the "Size Guide"',
        ],
        'add_existing' => 'Add existing',
        'languages' => [
            'translate_all_fields_from' => 'Translate all fields from :lang',
            'confirm_translation' => 'Do you confirm this operation? Previous translations will be overwritten.',
            'translations_in_progress' => 'Translation in progress...',
        ],
    ],
    'alert' => [
        'delete_category' => 'Are you sure you want to delete this category? The relevant subcategories will also be deleted.'
    ],
];
