<?php

return [
    'title' => 'Categorie',
    'index' => [
        'title' => 'Categorie',
        'table' => [
            'title' => 'Categorie',
            'cols'  => [
                'id'   => 'ID',
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
        'add_existing' => 'Aggiungi esistente',
    ],
    'alert' => [
        'delete_category' => 'Confermi di voler eliminare questa categoria? Verranno eliminate anche le relative sottocategorie.'
    ],
];
