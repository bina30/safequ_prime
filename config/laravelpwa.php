<?php

return [
    'name' =>  env('APP_NAME', 'SafeQU'),
    'manifest' => [
        'name' => env('APP_NAME', 'SafeQU'),
        'short_name' => env('APP_NAME', 'SafeQU'),
        'start_url' => '/',
        'background_color' => '#ffffff',
        'theme_color' => '#000000',
        'display' => 'standalone',
        'orientation'=> 'any',
        'status_bar'=> 'black',
        'icons' => [
            '72x72' => [
                'path' => static_asset('/assets/img/pwa/icon-72x72.png'),
                'purpose' => 'any'
            ],
            '96x96' => [
                'path' => static_asset('/assets/img/pwa/icon-96x96.png'),
                'purpose' => 'any'
            ],
            '128x128' => [
                'path' => static_asset('/assets/img/pwa/icon-128x128.png'),
                'purpose' => 'any'
            ],
            '144x144' => [
                'path' => static_asset('/assets/img/pwa/icon-144x144.png'),
                'purpose' => 'any'
            ],
            '152x152' => [
                'path' => static_asset('/assets/img/pwa/icon-152x152.png'),
                'purpose' => 'any'
            ],
            '192x192' => [
                'path' => static_asset('/assets/img/pwa/icon-192x192.png'),
                'purpose' => 'any'
            ],
            '256x256' => [
                'path' => static_asset('/assets/img/pwa/icon-256x256.png'),
                'purpose' => 'any'
            ],
            '512x512' => [
                'path' => static_asset('/assets/img/pwa/icon-512x512.png'),
                'purpose' => 'any'
            ],
        ],
        'splash' => [
            '640x1136' => static_asset('/assets/img/pwa/splash-640x1136.png'),
            '750x1334' => static_asset('/assets/img/pwa/splash-750x1334.png'),
            '828x1792' => static_asset('/assets/img/pwa/splash-828x1792.png'),
            '1125x2436' => static_asset('/assets/img/pwa/splash-1125x2436.png'),
            '1242x2208' => static_asset('/assets/img/pwa/splash-1242x2208.png'),
            '1242x2688' => static_asset('/assets/img/pwa/splash-1242x2688.png'),
            '1536x2048' => static_asset('/assets/img/pwa/splash-1536x2048.png'),
            '1668x2224' => static_asset('/assets/img/pwa/splash-1668x2224.png'),
            '1668x2388' => static_asset('/assets/img/pwa/splash-1668x2388.png'),
            '2048x2732' => static_asset('/assets/img/pwa/splash-2048x2732.png'),
        ],
        'shortcuts' => [
            [
                'name' =>  env('APP_NAME', 'SafeQU'),
                'description' => 'Product straight from the source',
                'url' => '/',
                'icons' => [
                    "src" => static_asset("/assets/img/pwa/icon-128x128.png"),
                    "purpose" => "any"
                ]
            ]
        ],
        'custom' => []
    ]
];
