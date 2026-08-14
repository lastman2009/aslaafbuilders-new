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
        'client_id' => '2142671872626192',
        'client_secret' => '9a92b65cb6fbd5dc9a70c9fef0480613',
        'redirect' => 'http://property.technologicalinc.com/auth/facebook/callback',
    ],
// 'github' => [
//     'client_id' =>'3a1f10976898cefc0509',
//     'client_secret' =>'ac4ad9ceb3c14d71abfc19406e243a280b4c6db1',
//     'redirect' =>'http://localhost:8000/auth/github/callback',
// ],
// 'twitter' => [
//     'client_id' =>'fT2glQvP7GIR3IlgcPKfalC0I',
//     'client_secret' =>'mLlPGwoMZBK4e7aTiGCwggSyAkT9Maz9XQSwtnPWgvQgNOginw',
//     'redirect' =>'http://localhost:8000/auth/twitter/callback',
// ],
    
    'google' => [
        'client_id' =>'319404346245-1mh19eingt1io04moo09aoe898iucis5.apps.googleusercontent.com',
        'client_secret' =>'vo1dUq5XbTJnHRTan5r1DQMr',
        'redirect' =>'http://property.technologicalinc.com/login/google/callback',
    ],
];