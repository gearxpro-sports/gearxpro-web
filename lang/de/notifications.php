<?php

return [
    'titles' => [
        'saving' => 'Schaffung',
        'updating' => 'Aktualisieren',
        'deleting' => 'Stornierung',
        'adding' => 'Zusatz'
    ],
    'actions' => [
        'show' => 'Sie sehen',
        'close' => 'Schließen',
    ],
    'profile' => [
        'updating' => [
            'success' => 'Dein Profil wurde erfolgreich aktualisiert!',
            'error' => 'Fehler beim Aktualisieren des Profils!',
        ],
    ],
    'customers' => [
        'saving' => [
            'success' => 'Der Client wurde erfolgreich erstellt!',
            'error' => 'Fehler beim Speichern des Kunden!',
        ],
        'updating' => [
            'success' => 'Der Kunde wurde erfolgreich aktualisiert!',
            'error' => 'Fehler beim Aktualisieren des Kunden!',
        ],
        'deleting' => [
            'success' => 'TDer Kunde wurde erfolgreich gelöscht!',
            'error' => 'Fehler beim Löschen des Kunden!',
        ],
    ],
    'resellers' => [
        'saving' => [
            'success' => 'Der Reseller wurde erfolgreich erstellt!',
            'error' => 'Fehler beim Speichern des Händlers!',
        ],
        'updating' => [
            'success' => 'Der Reseller wurde erfolgreich aktualisiert!',
            'error' => 'Fehler beim Aktualisieren des Händlers!',
        ],
        'deleting' => [
            'success' => 'Der Reseller wurde erfolgreich gelöscht!',
            'error' => 'Fehler beim Löschen des Resellers!',
        ],
        'updating_missing_data' => [
            'success' => 'Profildaten erfolgreich aktualisiert!',
            'error' => 'Fehler beim Aktualisieren der Profildaten!',
        ],
    ],
    'products' => [
        'saving' => [
            'success' => 'Das Produkt wurde erfolgreich erstellt!',
            'error' => 'Fehler beim Speichern des Produkts!',
        ],
        'updating' => [
            'success' => 'Das Produkt wurde erfolgreich aktualisiert!',
            'error' => 'Fehler beim Aktualisieren des Produkts!',
        ],
        'deleting' => [
            'success' => 'Das Produkt wurde erfolgreich gelöscht!',
            'error' => 'Fehler beim Löschen des Produkts!',
        ],
    ],
    'product_variants' => [
        'saving' => [
            'success' => 'Die Variationen wurden erfolgreich erstellt!',
            'error' => 'Fehler beim Speichern der Varianten!',
        ],
        'updating' => [
            'success' => 'Die Varianten wurden erfolgreich aktualisiert!',
            'error' => 'Fehler beim Aktualisieren der Varianten!',
        ],
        'deleting' => [
            'success' => 'Die Variante wurde erfolgreich eliminiert!',
            'error' => 'Fehler beim Löschen der Variante!',
        ],
    ],
    'categories' => [
        'saving' => [
            'success' => 'Die Kategorie wurde erfolgreich erstellt!',
            'error' => 'Fehler beim Speichern der Kategorie!',
        ],
        'updating' => [
            'success' => 'Die Kategorie wurde erfolgreich aktualisiert!',
            'error' => 'Fehler beim Aktualisieren der Kategorie!',
            'children_success' => 'Die Unterkategorieliste wurde erfolgreich aktualisiert!'
        ],
        'deleting' => [
            'success' => 'Die Kategorie wurde erfolgreich gelöscht!',
            'error' => 'Fehler beim Löschen der Kategorie!',
        ],
    ],
    'supply' => [
        'adding' => [
            'success' => 'Das Produkt wurde erfolgreich hinzugefügt!'
        ],
        'status_changed' => [
            'success' => 'Der Bestellstatus wurde erfolgreich geändert',
            'error' => 'Es ist nicht möglich, den Bestellstatus zu ändern',
        ]
    ],
    'customer' => [
        'error' => [
            'password' => [
                'title' => 'Passwort ungültig',
                'description' => 'Das Passwort muss dem geforderten Format entsprechen.'
            ],
            'address' => [
                'title' => 'Ungültige Adresse',
                'description' => 'Stellen Sie sicher, dass die eingegebene Adresse korrekt ist und die Hausnummer enthält!'
            ]
        ],
        'success' => [
            'password' => [
                'title' => 'das Passwort wurde erfolgreich geändert',
            ],
        ]
    ],
    'orders' => [
        'statuses_changed' => [
            'success' => 'Die ausgewählten Bestellstatus wurden erfolgreich geändert',
            'error' => 'Es ist nicht möglich, den Status der ausgewählten Bestellungen zu ändern',
        ],
        'status_changed' => [
            'success' => 'Der Bestellstatus wurde erfolgreich geändert',
            'error' => 'Es ist nicht möglich, den Bestellstatus zu ändern',
        ]
    ],
    'countries' => [
        'updating_reseller' => [
            'success' => 'Reseller erfolgreich aktualisiert',
            'error' => 'Es ist nicht möglich, den Reseller zu aktualisieren',
        ],
    ],
];
