<?php

return [
    'title' => 'Kategorien',
    'index' => [
        'title' => 'Kategorien',
        'table' => [
            'title' => 'Kategorien',
            'cols'  => [
                'id'   => 'AUSWEIS',
                'name' => 'Vorname',
            ],
        ],
    ],
    'create' => [
        'title' => 'Neue Kategorie erstellen',
        'name' => [
            'label' => 'Vorname',
        ],
    ],
    'edit' => [
        'title' => 'Kategorie bearbeiten',
        'child_categories_title' => 'Unterkategorien',
        'child_categories_modal_title' => 'Unterkategorie erstellen',
        'parent_link' => 'Eltern-Kategorie',
        'name' => [
            'label' => 'Vornamee',
        ],
        'description' => [
            'label' => 'Beschreibung',
        ],
        'size_guide' => [
            'title' => 'Leitfaden zur Größe',
            'subtitle' => 'Wählen Sie aus, welche Tabellen in der "Größentabelle" angezeigt werden sollen.',
        ],
        'add_existing' => 'Vorhandenes hinzufügen',
        'languages' => [
            'translate_all_fields_from' => 'Alle Felder von :lang übersetzen',
            'confirm_translation' => 'Bestätigen Sie diesen Vorgang? Vorherige Übersetzungen werden überschrieben.',
            'translations_in_progress' => 'Übersetzung in Bearbeitung...',
        ],
    ],
    'alert' => [
        'delete_category' => 'Sind Sie sicher, dass Sie diese Kategorie löschen möchten? Die entsprechenden Unterkategorien werden ebenfalls gelöscht.'
    ],
];
