<?php

return [
    'title' => 'Categorie',
    'index' => [
        'title' => 'Categorie',
        'table' => [
            'title' => 'Categorie',
            'cols'  => [
                'name' => 'Nome',
            ],
        ],
    ],
    'create' => [
        'title' => 'Crea nuova categoria',
        'name' => [
            'label' => 'Nome',
        ],
        'description' => [
            'label' => 'Descrizione',
        ],
    ],
    'edit' => [
        'title' => 'Modifica categoria',
        'child_categories_title' => 'Sottocategorie',
        'child_categories_modal_title' => 'Crea Sottocategoria',
        'parent_link' => 'Categoria genitore',
        'name' => [
            'label' => 'Nome',
        ],
        'description' => [
            'label' => 'Descrizione',
        ],
        'alert' => [
            'delete_child' => 'Confermi di eliminare questa categoria?',
        ],
    ],
];
