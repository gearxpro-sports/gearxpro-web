<?php

return [
    'title' => 'Prodotti',
    'stock' => [
        'in_stock' => 'Disponibile',
        'out_of_stock' => 'Non disponibile',
    ],
    'index' => [
        'title' => 'Prodotti',
        'add_product_modal_title' => 'Crea Prodotto',
        'table' => [
            'title' => 'Prodotti',
            'cols'  => [
                'id'   => 'ID',
                'name' => 'Nome Prodotto',
            ],
        ],
        'alert' => [
            'delete_product' => 'Confermi di voler eliminare questo prodotto?'
        ],
    ],
    'edit' => [
        'title' => 'Modifica',
        'categories_title' => 'Categorie',
        'tabs' => [
            'main'           => 'Informazioni',
            'size_guide' => 'Guida alle taglie',
            'options'        => 'Opzioni',
            'locale'         => 'Localizzazione',
            'images'         => 'Immagini',
            'main_desc'      => 'Prodotto',
            'features_desc'  => 'Caratteristiche',
            'pros_desc'      => 'Vantaggi',
            'technical_desc' => 'Tecnicità',
            'washing_desc'   => 'Instruzioni di lavaggio',
        ],
        'languages' => [
            'translate_all_fields_from' => 'Traduci tutti i campi da :lang',
            'confirm_translation' => 'Confermi questa operazione? Le precedenti traduzioni verrano sovrascritte.',
            'translations_in_progress' => 'Traduzione in corso...',
        ],
        'section' => [
            'locale' => [
                'title' => 'Localizzazione',
                'price_description' => 'Per rendere disponibile questo prodotto in fase di approvvigionamento e di vendita
                                        é necessario inserire entrambi i prezzi.',
                'wholesale_price' => [
                    'label' => 'Prezzo di acquisto (B2B)',
                ],
                'price' => [
                    'label' => 'Prezzo di vendita (B2C)',
                ],
            ],
            'main' => [
                'name' => [
                    'label' => 'Nome prodotto',
                ],
                'slug' =>[
                    'label' => 'Friendly Url',
                    'action' => 'Genera lo slug tramite il nome prodotto inserito',
                ],
                'main_desc' =>[
                    'placeholder' => 'Descrizione Prodotto...',
                ],
                'features_desc' =>[
                    'placeholder' => 'Descrizione Caratteristiche...',
                ],
                'pros_desc' =>[
                    'placeholder' => 'Descrizione Vantaggi...',
                ],
                'technical_desc' =>[
                    'placeholder' => 'Descrizione Tecnicità...',
                ],
                'washing_desc' =>[
                    'placeholder' => 'Descrizione Istruzioni di lavaggio...',
                ],
                'meta_title' => [
                    'label' => 'Titolo SEO',
                ],
                'meta_description' => [
                    'label' => 'Descrizione SEO',
                ],
                'descriptons_label' => 'Descrizioni',
            ],
            'options' => [
                'generate_variants' => 'Genera le varianti',
                'edit_variant_modal_title' => 'Modifica variante',
                'attributes_title' => 'Attributi',
                'product_variants_title' => 'Lista Varianti',
                'sku' => [
                    'label' => 'Codice interno',
                ],
                'barcode' => [
                    'label' => 'Codice a barre',
                ],
                'quantity' => [
                    'label' => 'Quantità',
                ],
                'alert' => [
                    'confirm_variant_delete' => 'Confermi di voler eliminare questa variante?',
                    //'confirm_switch_to_simple_product' => 'Confermi di passare a prodotto semplice? Al salvataggio del prodottto perderai tutte le varianti impostate precedentemente!',
                ],
                'errors' => [
                    'variant_form' => 'Si è verificato un errore nel salvataggio della variante.',
                ],
            ],
            'images' => [

            ]
        ],
        'size_guide' => [
            'title' => 'Guida alle taglie',
            'subtitle' => 'Seleziona quali tabelle visualizzare nella "Guida alle taglie"',
        ],
    ],
];
