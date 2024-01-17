<?php

return [
    'login' => [
        'title' => 'Log in',
        'description' => 'Enter your credentials to log in.',
        'email' => [
            'label'       => 'Email',
            'placeholder' => 'Log in with your email',
        ],
        'password' => [
            'label'       => 'Password',
            'placeholder' => 'Enter your password',
            'forgetLink'  => 'Password forgot?',
        ],
        'rememberme' => [
            'label' => 'remember me',
        ],
        'submit' => 'Log in',
    ],
    'forget_password' => [
        'title' => 'Recover your password',
        'description' => 'Enter your email and we will send you instructions to reset your password',
        'email' => [
            'label'       => 'E-mail',
            'placeholder' => 'Enter your email',
        ],
        'submit' => 'Recover your password',
    ],
    'reset_password' => [
        'title' => 'Reset your password',
        'description' => 'Enter your email and your new password',
        'email' => [
            'label'       => 'E-mail',
            'placeholder' => 'Enter your email',
        ],
        'password' => [
            'label'       => 'New Password',
            'placeholder' => 'Enter your new password',
        ],
        'password_confirmation' => [
            'label'       => 'Confirm password',
            'placeholder' => 'Re-enter your new password to confirm',
        ],
        'submit' => 'Reset password',
    ],
    'profile' => [
        'update_password' => [
            'title' => 'Update your password',
            'subtitle' => 'Make sure your password is secure.',
            'fields' => [
                'current_password' => 'Current Password',
                'new_password' => 'New Password',
                'confirm_password' => 'Confirm your password',
            ]
        ],
        'delete_account' => [
            'title' => 'Delete account',
            'subtitle' => 'If you delete your account, all data and settings will be permanently deleted. Before deleting your account, make sure you have saved your account settings.',
            'button' => 'Delete account',
            'modal' => [
                'title' => 'AAre you sure you want to delete your account?',
                'subtitle' => 'If you delete your account, all data and settings will be permanently deleted. Enter your password to proceed with deleting your account.',
                'button' => 'Delete account'
            ]
        ],
    ],
    'messages' => [
        'failed'   => 'Incorrect credentials.',
        'password' => 'Wrong password',
        'throttle' => 'Too many login attempts. Please try again in :seconds seconds.',
    ]
];
