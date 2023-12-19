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
        'languages' => [
            'translate_all_fields_from' => 'Traduci tutti i campi da :lang',
            'confirm_translation' => 'Confermi questa operazione? Le precedenti traduzioni verrano sovrascritte.',
            'translations_in_progress' => 'Traduzione in corso...',
        ],
    ],
    'alert' => [
        'delete_category' => 'Confermi di voler eliminare questa categoria? Verranno eliminate anche le relative sottocategorie.'
    ],
];
