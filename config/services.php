<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Third Party Services
    |--------------------------------------------------------------------------
    |
    | This file is for storing the credentials for third party services such
    | as Stripe, Mailgun, SparkPost and others. This file provides a sane
    | default location for this type of information, allowing packages
    | to have a conventional place to find your various credentials.
    |
    */

    'mailgun' => [
        'domain' => env('MAILGUN_DOMAIN'),
        'secret' => env('MAILGUN_SECRET'),
    ],

    'ses' => [
        'key' => env('SES_KEY'),
        'secret' => env('SES_SECRET'),
        'region' => 'us-east-1',
    ],

    'sparkpost' => [
        'secret' => env('SPARKPOST_SECRET'),
    ],

    'stripe' => [
        'model' => App\User::class,
        'key' => env('STRIPE_KEY'),
        'secret' => env('STRIPE_SECRET'),
    ],
    'facebook' => [
        'client_id' => '300492737066948',
        'client_secret' => 'f2d0497048b01a7962a89af58b827d23',
        'redirect' => 'http://inventory-tracking.dev/callback/facebook',
    ],

    'google' => [
        'client_id' => '1032295513851-e5ecki96goeu83nh9589el4tr0qtg0g2.apps.googleusercontent.com',
        'client_secret' => 'rC8pljLjxCXe4ZOXnQz_-M2X',
        'redirect' => 'http://inventory-tracking.dev/callback/google',
    ],

];
