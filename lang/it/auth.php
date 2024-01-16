<?php

return [
    'login' => [
        'title' => 'Log in',
        'description' => 'Inserisci le tue credenziali per accedere.',
        'email' => [
            'label'       => 'Email',
            'placeholder' => 'Log in con la tua mail',
        ],
        'password' => [
            'label'       => 'Password',
            'placeholder' => 'Inserisci la password',
            'forgetLink'  => 'Password dimenticata?',
        ],
        'rememberme' => [
            'label' => 'Ricordami',
        ],
        'submit' => 'Accedi',
    ],
    'forget_password' => [
        'title' => 'Recupera la password',
        'description' => 'Inserisci la mail e ti invieremo le istruzioni per resettare la password',
        'email' => [
            'label'       => 'Email',
            'placeholder' => 'Inserisci la tua mail',
        ],
        'submit' => 'Recupera la password',
    ],
    'reset_password' => [
        'title' => 'Resetta la password',
        'description' => 'Inserisci la tua mail e la tua nuova password',
        'email' => [
            'label'       => 'Email',
            'placeholder' => 'Inserisci la tua mail',
        ],
        'password' => [
            'label'       => 'Nuova password',
            'placeholder' => 'Inserisci la tua nuova password',
        ],
        'password_confirmation' => [
            'label'       => 'Conferma password',
            'placeholder' => 'RReinserisci la tua nuova password per conferma',
        ],
        'submit' => 'Reset password',
    ],
    'profile' => [
        'update_password' => [
            'title' => 'Aggiorna la tua password',
            'subtitle' => 'Assicurati che la tua password sia sicura',
            'fields' => [
                'current_password' => 'Password attuale',
                'new_password' => 'Nuova password',
                'confirm_password' => 'Conferma la tua password',
            ]
        ],
        'delete_account' => [
            'title' => 'Cancella account',
            'subtitle' => 'Se cancelli il tuo account, tutti i dati e le tue impostazioni verranno cancellati permanentemente. Prima di eliminare il tuo account assicurati di aver salvato le impostazioni dell\'account.',
            'button' => 'Cancella account',
            'modal' => [
                'title' => 'Sei sicuro di voler cancellare il tuo account?',
                'subtitle' => 'Se cancelli il tuo account, tutti i dati e le tue impostazioni verranno cancellati permanentemente. Inserisci la tua password per poter procedere alla cancellazione del tuo account.',
                'button' => 'Cancella account'
            ]
        ],
    ],
    'messages' => [
        'failed'   => 'Credenziali errate.',
        'password' => 'Password errata',
        'throttle' => 'Troppi tentativi di accesso. Riprova tra :seconds secondi.',
    ]
];
