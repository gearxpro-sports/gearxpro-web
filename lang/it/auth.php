<?php

return [
    'login' => [
        'title' => 'Accedi',
        'description' => 'Inserisci il tuo indirizzo email e la password per accedere all’account.',
        'email' => [
            'label'       => 'Indirizzo Email',
            'placeholder' => 'Entra con la tua email',
        ],
        'password' => [
            'label'       => 'Password',
            'placeholder' => 'Inserisci la tua password',
            'forgetLink'  => 'Password dimenticata?',
        ],
        'rememberme' => [
            'label' => 'Ricordami',
        ],
        'submit' => 'Accedi',
    ],
    'forget_password' => [
        'title' => 'Recupera password',
        'description' => 'Inserisci il tuo indirizzo email e ti invieremo per email le istruzioni per reimpostare la password.',
        'email' => [
            'label'       => 'Indirizzo Email',
            'placeholder' => 'Inserisci la tua email',
        ],
        'submit' => 'Recupera password',
    ],
    'reset_password' => [
        'title' => 'Reimposta password',
        'description' => 'Inserisci il tuo indirizzo email e la nuova password.',
        'email' => [
            'label'       => 'Indirizzo Email',
            'placeholder' => 'Inserisci la tua email',
        ],
        'password' => [
            'label'       => 'Nuova password',
            'placeholder' => 'Inserisci la tua nuova password',
        ],
        'password_confirmation' => [
            'label'       => 'Conferma password',
            'placeholder' => 'Reinserisci la tua nuova password per la conferma',
        ],
        'submit' => 'Reimposta password',
    ],
    'profile' => [
        'update_password' => [
            'title' => 'Aggiorna Password',
            'subtitle' => 'Assicuratevi che il vostro account utilizzi una password lunga e casuale per rimanere al sicuro.',
            'fields' => [
                'current_password' => 'Password Attuale',
                'new_password' => 'Nuova Password',
                'confirm_password' => 'Conferma Password',
            ]
        ],
        'delete_account' => [
            'title' => 'Elimina Account',
            'subtitle' => 'Una volta cancellato l\'account, tutte le risorse e i dati saranno eliminati in modo permanente. Prima di eliminare l\'account, scaricare tutti i dati e le informazioni che si desidera conservare.',
            'button' => 'Elimina Account',
            'modal' => [
                'title' => 'Sei sicuro di voler eliminare il tuo account?',
                'subtitle' => 'Una volta cancellato l\'account, tutte le sue risorse e i suoi dati saranno eliminati in modo permanente. Inserire la password per confermare la volontà di eliminare definitivamente il proprio account.',
                'button' => 'Cancella Account'
            ]
        ],
    ],
    'messages' => [
        'failed'   => 'Credenziali di acesso errate.',
        'password' => 'Password non corretta',
        'throttle' => 'Troppi tentativi di accesso. Riprovare tra :seconds secondi.',
    ]
];
