<?php

use Illuminate\Support\Facades\Facade;
use Illuminate\Support\ServiceProvider;

return [

   

    'name' => env('APP_NAME', 'Laravel'),

  

    'env' => env('APP_ENV', 'production'),

   

    'debug' => (bool) env('APP_DEBUG', false),

    

    'url' => env('APP_URL', 'http://localhost'),

    'asset_url' => env('ASSET_URL'),

    

    'timezone' => 'UTC',

   

    'locale' => 'en',

   

    'fallback_locale' => 'en',

    /*
    |--------------------------------------------------------------------------
    | Faker Locale
    |--------------------------------------------------------------------------
    |
    | This locale will be used by the Faker PHP library when generating fake
    | data for your database seeds. For example, this will be used to get
    | localized telephone numbers, street address information and more.
    |
    */

    'faker_locale' => 'en_US',

    
    'key' => env('APP_KEY'),

    'cipher' => 'AES-256-CBC',

    

    'maintenance' => [
        'driver' => 'file',
        // 'store' => 'redis',
    ],

   

    'providers' => ServiceProvider::defaultProviders()->merge([
       
        App\Providers\AppServiceProvider::class,
        App\Providers\AuthServiceProvider::class,
        // App\Providers\BroadcastServiceProvider::class,
        App\Providers\EventServiceProvider::class,
        App\Providers\RouteServiceProvider::class,
    ])->toArray(),

   

    'aliases' => Facade::defaultAliases()->merge([
        // 'Example' => App\Facades\Example::class,
    ])->toArray(),

];
