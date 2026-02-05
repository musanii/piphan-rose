<?php

return [
    'dashboard'=>[
        'modules'=>[
            'App\Models\Inventory' => [
                'name' => 'inventories',
                'label' => 'Food Items',
                'icon' => 'calendar', // You can change icons later
                'activity' => true,
                'draft' => false, // Show live items
                'search' => true,
            ],
            'App\Models\Student' => [
                'name' => 'students',
                'label' => 'Students',
                'icon' => 'person', // You can change icons later
                'activity' => true,
                'draft' => false, // Show live items
                'search' => true,
            ],

        ],
    ],
    'enabled'=>[
        'users-management'=>true,
        'media-library'=>true,
        'file-library'=>true
    ],
    'block_editor'=>[
        'use_twill_blocks'=>true
    ],
];
