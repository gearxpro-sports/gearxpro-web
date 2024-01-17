<?php

return [
    'login' => [
        'title' => 'Anmeldung',
        'description' => 'Geben Sie Ihre Zugangsdaten ein, um sich anzumelden.',
        'email' => [
            'label'       => 'Email',
            'placeholder' => 'Melden Sie sich mit Ihrer E-Mail-Adresse an',
        ],
        'password' => [
            'label'       => 'Passwort',
            'placeholder' => 'Geben Sie Ihr Passwort ein',
            'forgetLink'  => 'Passwort vergessen?',
        ],
        'rememberme' => [
            'label' => 'erinnere dich an mich',
        ],
        'submit' => 'Anmeldung',
    ],
    'forget_password' => [
        'title' => 'Stellen Sie Ihr Passwort wieder her',
        'description' => 'Geben Sie Ihre E-Mail-Adresse ein und wir senden Ihnen Anweisungen zum Zurücksetzen Ihres Passworts',
        'email' => [
            'label'       => 'Email',
            'placeholder' => 'Geben sie ihre E-Mail Adresse ein',
        ],
        'submit' => 'Stellen Sie Ihr Passwort wieder her',
    ],
    'reset_password' => [
        'title' => 'Setze dein Passwort zurück',
        'description' => 'Geben Sie Ihre E-Mail-Adresse und Ihr neues Passwort ein',
        'email' => [
            'label'       => 'Email',
            'placeholder' => 'Geben sie ihre E-Mail Adresse ein',
        ],
        'password' => [
            'label'       => 'Neues Kennwort',
            'placeholder' => 'Gib dein neues Passwort ein',
        ],
        'password_confirmation' => [
            'label'       => 'Bestätige das Passwort',
            'placeholder' => 'Geben Sie Ihr neues Passwort zur Bestätigung erneut ein',
        ],
        'submit' => 'Passwort zurücksetzen',
    ],
    'profile' => [
        'update_password' => [
            'title' => 'Aktualisieren Sie Ihr Passwort',
            'subtitle' => 'Stellen Sie sicher, dass Ihr Passwort sicher ist',
            'fields' => [
                'current_password' => 'Aktuelles Passwort',
                'new_password' => 'Neues Kennwort',
                'confirm_password' => 'Bestätigen Sie Ihr Passwort',
            ]
        ],
        'delete_account' => [
            'title' => 'Konto löschen',
            'subtitle' => 'Wenn Sie Ihr Konto löschen, werden alle Daten und Einstellungen dauerhaft gelöscht. Bevor Sie Ihr Konto löschen, stellen Sie sicher, dass Sie Ihre Kontoeinstellungen gespeichert haben.',
            'button' => 'Konto löschen',
            'modal' => [
                'title' => 'Sind Sie sicher, dass Sie Ihr Konto löschen möchten?',
                'subtitle' => 'Wenn Sie Ihr Konto löschen, werden alle Daten und Einstellungen dauerhaft gelöscht. Geben Sie Ihr Passwort ein, um mit der Löschung Ihres Kontos fortzufahren.',
                'button' => 'Konto löschen'
            ]
        ],
    ],
    'messages' => [
        'failed'   => 'Falsche Anmeldeinformationen.',
        'password' => 'Falsches Passwort',
        'throttle' => 'Zu viele Anmeldeversuche. Bitte versuchen Sie es in :seconds Sekunden erneut.',
    ]
];
