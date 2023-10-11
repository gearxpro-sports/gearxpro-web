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
    'messages' => [
        'failed'   => 'Credenziali di acesso errate.',
        'password' => 'Password non corretta',
        'throttle' => 'Troppi tentativi di accesso. Riprovare tra :seconds secondi.',
    ]
];
