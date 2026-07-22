<?php

return [
    'default' => 'file',

    'stores' => [
        'file' => [
            'driver' => 'file',
            'path' => env('CACHE_PATH', storage_path('framework/cache/data')),
            'lock_path' => env('CACHE_LOCK_PATH', storage_path('framework/cache/data')),
        ],
    ],

    'serializable_classes' => false,
];
