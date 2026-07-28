<?php

return [
    'name' => env('APP_NAME', 'KICC Admin'),
    'env' => env('APP_ENV', 'production'),
    'debug' => (bool) env('APP_DEBUG', false),
    'url' => env('APP_URL', 'http://localhost'),
    'timezone' => 'Africa/Nairobi',
    'locale' => 'en',
    'fallback_locale' => 'en',
    'faker_locale' => 'en_US',
    'cipher' => 'AES-256-CBC',
    'key' => env('APP_KEY'),
    'previous_keys' => array_filter(explode(',', env('APP_PREVIOUS_KEYS', ''))),
    'maintenance' => ['driver' => 'file'],
    'providers' => [
        App\Providers\AppServiceProvider::class,
        App\Providers\Filament\AdminPanelProvider::class,
        Spatie\Permission\PermissionServiceProvider::class,
    ],
];