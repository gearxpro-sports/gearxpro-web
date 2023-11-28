<?php

return [
    'login' => [
        'title' => 'Accedi',
        'description' => 'Insert your credentials to log in.',
        'email' => [
            'label'       => 'Email',
            'placeholder' => 'Log in with your email',
        ],
        'password' => [
            'label'       => 'Password',
            'placeholder' => 'Insert your password',
            'forgetLink'  => 'Password forgot?',
        ],
        'rememberme' => [
            'label' => 'Remember me',
        ],
        'submit' => 'Login',
    ],
    'forget_password' => [
        'title' => 'Recover your password',
        'description' => 'Enter your email address and we will email you instructions for resetting your password.',
        'email' => [
            'label'       => 'Email',
            'placeholder' => 'Insert your email',
        ],
        'submit' => 'Recover your password',
    ],
    'reset_password' => [
        'title' => 'Reset your password',
        'description' => 'Enter your email address and new password.',
        'email' => [
            'label'       => 'Email',
            'placeholder' => 'Insert your email',
        ],
        'password' => [
            'label'       => 'New password',
            'placeholder' => 'Insert your new password',
        ],
        'password_confirmation' => [
            'label'       => 'Confirm password',
            'placeholder' => 'Re-enter your new password for confirmation',
        ],
        'submit' => 'Reset password',
    ],
    'profile' => [
        'update_password' => [
            'title' => 'Update Password',
            'subtitle' => 'Make sure your account uses a long, random password to stay safe.',
            'fields' => [
                'current_password' => 'Actual Password',
                'new_password' => 'New Password',
                'confirm_password' => 'Confirm Password',
            ]
        ],
        'delete_account' => [
            'title' => 'Delete Account',
            'subtitle' => 'Once you delete your account, all assets and data will be permanently deleted. Before deleting your account, download any data and information you want to keep.',
            'button' => 'Delete Account',
            'modal' => [
                'title' => 'Are you sure to delete your account?',
                'subtitle' => 'Once you delete your account, all of your assets and data will be permanently deleted. Enter your password to confirm your desire to permanently delete your account.',
                'button' => 'Delete Account'
            ]
        ],
    ],
    'messages' => [
        'failed'   => 'Bad credentials.',
        'password' => 'Wrong password',
        'throttle' => 'Too many attemps. Try again in :seconds seconds.',
    ]
];
