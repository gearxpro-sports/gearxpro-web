<?php

return [
    'title' => 'Produkte',
    'stock' => [
        'in_stock' => 'Verfügbar',
        'out_of_stock' => 'Nicht verfügbar',
    ],
    'index' => [
        'title' => 'Produkte',
        'add_product_modal_title' => 'Produkt erstellen',
        'table' => [
            'title' => 'Produkte',
            'cols'  => [
                'id'   => 'AUSWEIS',
                'name' => 'Produktname',
            ],
        ],
        'alert' => [
            'delete_product' => 'Sind Sie sicher, dass Sie dieses Produkt löschen möchten?'
        ],
    ],
    'edit' => [
        'title' => 'Bearbeiten',
        'categories_title' => 'Kategorien',
        'tabs' => [
            'main'           => 'Information',
            'options'        => 'Optionen',
            'locale'         => 'Standort',
            'images'         => 'Bilder',
            'main_desc'      => 'Produkt',
            'features_desc'  => 'Eigenschaften',
            'pros_desc'      => 'Vorteile',
            'technical_desc' => 'Technizität',
            'washing_desc'   => 'Waschanleitung',
        ],
        'languages' => [
            'translate_all_fields_from' => 'Alle Felder von :lang übersetzen',
            'confirm_translation' => 'Bestätigen Sie diesen Vorgang? Vorherige Übersetzungen werden überschrieben.',
            'translations_in_progress' => 'Übersetzung in Bearbeitung...',
        ],
        'section' => [
            'locale' => [
                'title' => 'Standort',
                'price_description' => 'Um dieses Produkt während der Beschaffungs- und Verkaufsphase verfügbar zu machen, müssen beide Preise eingegeben werden.',
                'wholesale_price' => [
                    'label' => 'Kaufpreis (B2B)',
                ],
                'price' => [
                    'label' => 'Verkaufspreis (B2C)',
                ],
            ],
            'main' => [
                'name' => [
                    'label' => 'Produktname',
                ],
                'slug' =>[
                    'label' => 'Freundliche URL',
                    'action' => 'Generieren Sie den Slug mit dem eingegebenen Produktnamen',
                ],
                'main_desc' =>[
                    'placeholder' => 'Produktbeschreibung...',
                ],
                'features_desc' =>[
                    'placeholder' => 'Beschreibung Merkmale...',
                ],
                'pros_desc' =>[
                    'placeholder' => 'Beschreibung Vorteile...',
                ],
                'technical_desc' =>[
                    'placeholder' => 'Beschreibung Technische Details...',
                ],
                'washing_desc' =>[
                    'placeholder' => 'Beschreibung Waschanleitung...',
                ],
                'meta_title' => [
                    'label' => 'SEO-Titel',
                ],
                'meta_description' => [
                    'label' => 'SEO-Beschreibung',
                ],
                'descriptons_label' => 'Beschreibungen',
            ],
            'options' => [
                'generate_variants' => 'Variationen generieren',
                'edit_variant_modal_title' => 'Variante bearbeiten',
                'attributes_title' => 'Attribute',
                'product_variants_title' => 'Liste der Varianten',
                'sku' => [
                    'label' => 'Interner Code',
                ],
                'barcode' => [
                    'label' => 'Barcode',
                ],
                'quantity' => [
                    'label' => 'Menge',
                ],
                'alert' => [
                    'Möchten Sie diese Variante wirklich löschen?',
                ],
                'errors' => [
                    'variant_form' => 'Beim Speichern der Variante ist ein Fehler aufgetreten.',
                ],
            ],
            'images' => [

            ]
        ],
    ],
];
