<?php

use Illuminate\Support\Str;

return [

    /*
    |--------------------------------------------------------------------------
    | Default  Store
    |--------------------------------------------------------------------------
    |
    | This option controls the default  connection that gets used while
    | using this caching library. This connection is used when another is
    | not explicitly specified when executing a given caching function.
    |
    */

    'default' => env('_DRIVER', 'file'),

    /*
    |--------------------------------------------------------------------------
    |  Stores
    |--------------------------------------------------------------------------
    |
    | Here you may define all of the  "stores" for your application as
    | well as their drivers. You may even define multiple stores for the
    | same  driver to group types of items stored in your s.
    |
    | Supported drivers: "apc", "array", "database", "file",
    |         "memd", "redis", "dynamodb", "octane", "null"
    |
    */

    'stores' => [

        'apc' => [
            'driver' => 'apc',
        ],

        'array' => [
            'driver' => 'array',
            'serialize' => false,
        ],

        'database' => [
            'driver' => 'database',
            'table' => '',
            'connection' => null,
            'lock_connection' => null,
        ],

        'file' => [
            'driver' => 'file',
            'path' => storage_path('framework//data'),
            'lock_path' => storage_path('framework//data'),
        ],

        'memd' => [
            'driver' => 'memd',
            'persistent_id' => env('MEMD_PERSISTENT_ID'),
            'sasl' => [
                env('MEMD_USERNAME'),
                env('MEMD_PASSWORD'),
            ],
            'options' => [
                // Memd::OPT_CONNECT_TIMEOUT => 2000,
            ],
            'servers' => [
                [
                    'host' => env('MEMD_HOST', '127.0.0.1'),
                    'port' => env('MEMD_PORT', 11211),
                    'weight' => 100,
                ],
            ],
        ],

        'redis' => [
            'driver' => 'redis',
            'connection' => '',
            'lock_connection' => 'default',
        ],

        'dynamodb' => [
            'driver' => 'dynamodb',
            'key' => env('AWS_ACCESS_KEY_ID'),
            'secret' => env('AWS_SECRET_ACCESS_KEY'),
            'region' => env('AWS_DEFAULT_REGION', 'us-east-1'),
            'table' => env('DYNAMODB__TABLE', ''),
            'endpoint' => env('DYNAMODB_ENDPOINT'),
        ],

        'octane' => [
            'driver' => 'octane',
        ],

    ],

    /*
    |--------------------------------------------------------------------------
    |  Key Prefix
    |--------------------------------------------------------------------------
    |
    | When utilizing the APC, database, memd, Redis, or DynamoDB 
    | stores there might be other applications using the same . For
    | that reason, you may prefix every  key to avoid collisions.
    |
    */

    'prefix' => env('_PREFIX', Str::slug(env('APP_NAME', 'laravel'), '_') . '__'),

];
