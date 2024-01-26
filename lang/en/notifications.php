<?php

return [
    'titles' => [
        'saving' => 'Creation',
        'updating' => 'Update',
        'deleting' => 'Cancellation',
        'adding' => 'Addition',
        'generic_error' => 'Error'
    ],
    'actions' => [
        'show' => 'You see',
        'close' => 'Close',
    ],
    'profile' => [
        'updating' => [
            'success' => 'Your profile has been successfully updated!',
            'error' => 'Error updating profile!',
        ],
    ],
    'customers' => [
        'saving' => [
            'success' => 'The client has been created successfully!',
            'error' => 'Error saving customer!',
        ],
        'updating' => [
            'success' => 'The customer has been successfully updated!',
            'error' => 'Error updating customer!',
        ],
        'deleting' => [
            'success' => 'The customer was successfully deleted!',
            'error' => 'Error deleting customer!',
        ],
    ],
    'resellers' => [
        'saving' => [
            'success' => 'The reseller has been created successfully!',
            'error' => 'Error saving dealer!',
        ],
        'updating' => [
            'success' => 'The reseller has been successfully updated!',
            'error' => 'Error updating dealer!',
        ],
        'deleting' => [
            'success' => 'The reseller has been successfully deleted!',
            'error' => 'Error deleting reseller!',
        ],
        'updating_missing_data' => [
            'success' => 'Profile data updated successfully!',
            'error' => 'Error updating profile data!',
        ],
    ],
    'products' => [
        'saving' => [
            'success' => 'The product was created successfully!',
            'error' => 'Error saving product!',
        ],
        'updating' => [
            'success' => 'The product has been successfully updated!',
            'error' => 'Error updating product!',
        ],
        'deleting' => [
            'success' => 'The product was successfully deleted!',
            'error' => 'Error deleting product!',
        ],
    ],
    'product_variants' => [
        'saving' => [
            'success' => 'The variations have been created successfully!',
            'error' => 'Error saving variants!',
        ],
        'updating' => [
            'success' => 'The variants have been successfully updated!',
            'error' => 'Error updating variants!',
        ],
        'deleting' => [
            'success' => 'The variant was successfully eliminated!',
            'error' => 'Error deleting variant!',
        ],
    ],
    'categories' => [
        'saving' => [
            'success' => 'The category was created successfully!',
            'error' => 'Error saving category!',
        ],
        'updating' => [
            'success' => 'The category has been successfully updated!',
            'error' => 'Error updating category!',
            'children_success' => 'The subcategory list has been successfully updated!'
        ],
        'deleting' => [
            'success' => 'The category has been successfully deleted!',
            'error' => 'Error deleting category!',
        ],
    ],
    'supply' => [
        'adding' => [
            'success' => 'The product has been added successfully!'
        ],
        'status_changed' => [
            'success' => 'The order status has been successfully changed',
            'error' => 'It is not possible to change the order status',
        ]
    ],
    'customer' => [
        'error' => [
            'password' => [
                'title' => 'Password invalid',
                'description' => 'The password must comply with the required format.'
            ],
            'address' => [
                'title' => 'Invalid address',
                'description' => 'Make sure the address entered is correct and includes the house number!'
            ]
        ],
        'success' => [
            'password' => [
                'title' => 'Password changed successfully',
            ],
        ]
    ],
    'orders' => [
        'statuses_changed' => [
            'success' => 'The selected order statuses have been successfully changed',
            'error' => 'It is not possible to change the statuses of the selected orders',
        ],
        'status_changed' => [
            'success' => 'The order status has been successfully changed',
            'error' => 'It is not possible to change the order status',
        ]
    ],
    'countries' => [
        'updating_reseller' => [
            'success' => 'Reseller successfully updated',
            'error' => 'It is not possible to update the reseller',
        ],
    ],
    'cart' => [
        'product_not_available' => [
            'tooltip' => 'Availability: :quantity',
            'error' => "The quantity available for some products in the cart is not sufficient.\nPlease change the quantity and try again.",
        ]
    ]
];
