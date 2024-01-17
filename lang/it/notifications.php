<?php

return [
    'titles' => [
        'saving' => 'Creazione',
        'updating' => 'Aggiornamento',
        'deleting' => 'Cancellazione',
        'adding' => 'Aggiunta'
    ],
    'actions' => [
        'show' => 'Vedi',
        'close' => 'Chiudi',
    ],
    'profile' => [
        'updating' => [
            'success' => 'Il profilo è stato aggiornato con successo!',
            'error' => 'Errore durante l\'aggiornamento del profilo!',
        ],
    ],
    'customers' => [
        'saving' => [
            'success' => 'Il cliente è stato creato con successo!',
            'error' => 'Errore durante il salvataggio del cliente!',
        ],
        'updating' => [
            'success' => 'Il cliente è stato aggiornato con successo!Il cliente è stato aggiornato con successo!',
            'error' => 'Errore durante l\'aggiornamento del cliente!',
        ],
        'deleting' => [
            'success' => 'Il cliente è stato eliminato con successo!',
            'error' => 'Errore durante l\'eliminazione del cliente!',
        ],
    ],
    'resellers' => [
        'saving' => [
            'success' => 'Il rivenditore è stato creato con successo!',
            'error' => 'Errore durante il salvataggio del rivenditore!',
        ],
        'updating' => [
            'success' => 'Il rivenditore è stato aggiornato con successo!',
            'error' => 'Errore durante l\'aggiornamento del rivenditore!',
        ],
        'deleting' => [
            'success' => 'Il rivenditore è stato eliminato con successo!',
            'error' => 'Errore durante l\'eliminazione del rivenditore!',
        ],
        'updating_missing_data' => [
            'success' => 'Dati profilo aggiornati con successo!',
            'error' => 'Errore durante l\'aggiornamento dei daati profilo!',
        ],
    ],
    'products' => [
        'saving' => [
            'success' => 'Il prodotto è stato creato con successo!',
            'error' => 'Errore durante il salvataggio del prodotto!',
        ],
        'updating' => [
            'success' => 'Il prodotto è stato aggiornato con successo!',
            'error' => 'Errore durante l\'aggiornamento del prodotto!',
        ],
        'deleting' => [
            'success' => 'Il prodotto è stato eliminato con successo!',
            'error' => 'Errore durante l\'eliminazione del prodotto!',
        ],
    ],
    'product_variants' => [
        'saving' => [
            'success' => 'Le varianti sono state create con successo!',
            'error' => 'Errore durante il salvataggio delle varianti!',
        ],
        'updating' => [
            'success' => 'Le varianti sono state aggiornate con successo!',
            'error' => 'Errore durante l\'aggiornamento del varianti!',
        ],
        'deleting' => [
            'success' => 'La variante è stata eliminata con successo!',
            'error' => 'Errore durante l\'eliminazione della variante!',
        ],
    ],
    'categories' => [
        'saving' => [
            'success' => 'La categoria è stata creata con successo!',
            'error' => 'Errore durante il salvataggio della categoria!',
        ],
        'updating' => [
            'success' => 'La categoria è stata aggiornata con successo!',
            'error' => 'Errore durante l\'aggiornamento della categoria!',
            'children_success' => 'La lista delle sottocategorie è stata aggiornata con successo!'
        ],
        'deleting' => [
            'success' => 'La categoria è stata eliminata con successo!',
            'error' => 'Errore durante l\'eliminazione della categoria!',
        ],
    ],
    'supply' => [
        'adding' => [
            'success' => 'Il prodotto è stato aggiunto con successo!'
        ],
        'status_changed' => [
            'success' => 'Lo stato dell\'ordine è stato modificato con successo',
            'error' => 'Non é possibile modificare lo stato dell\'ordine',
        ]
    ],
    'customer' => [
        'error' => [
            'password' => [
                'title' => 'Passord non valida',
                'description' => 'La password deve rispettare il formato richiesto.'
            ],
            'address' => [
                'title' => 'Indirizzo non valido',
                'description' => 'Assicurati che l\'indirizzo inserito sia corretto e comprensivo di numero civico!'
            ]
        ],
        'success' => [
            'password' => [
                'title' => 'Passord modificata correttamente',
            ],
        ]
    ],
    'orders' => [
        'statuses_changed' => [
            'success' => 'Gli stati degli ordini selezionati sono stati modificati con successo',
            'error' => 'Non é possibile modificare gli stati degli ordini selezionati',
        ],
        'status_changed' => [
            'success' => 'Lo stato dell\'ordine è stato modificato con successo',
            'error' => 'Non é possibile modificare lo stato dell\'ordine',
        ]
    ],
    'countries' => [
        'updating_reseller' => [
            'success' => 'Rivenditore aggiornato con successo',
            'error' => 'Non é possibile aggiornare il rivenditore',
        ],
    ],
];
