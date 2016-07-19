<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Third Party Services
    |--------------------------------------------------------------------------
    |
    | This file is for storing the credentials for third party services such
    | as Stripe, Mailgun, Mandrill, and others. This file provides a sane
    | default location for this type of information, allowing packages
    | to have a conventional place to find your various credentials.
    |
    */

    'mailgun' => [
        'domain' => env('MAILGUN_DOMAIN'),
        'secret' => env('MAILGUN_SECRET'),
    ],

    'mandrill' => [
        'secret' => env('MANDRILL_SECRET'),
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
    'qq' => [
        'client_id'     => '101333008',
        'client_secret' => '066adfd18bd45760feb4d56ca8ab6347',
        'redirect'      => 'http://scistats.com'
    ],
    'wechat' => [
        'client_id'     => 'wx7488f0a8bd1420da',
        'client_secret' => 'd1dd885f6530213f8543b9150f84e721',
        'redirect'      => 'http://statsv1.dev/socialite/callback.php'
    ]

];
