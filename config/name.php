<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Forum Routes
    |--------------------------------------------------------------------------
    |
    | Here you can specify the specific routes for the different sections of
    | your forum.
    |
    */

    'name' => [
        'app' => 'RightDeed',
    ],
    'social_media' => [
        'facebook' => 'https://www.facebook.com/rightdeedcom-170312050190930',
        'youtube' => 'https://youtu.be/7bNIkrtZwTw',
        'linkedin' => 'https://www.linkedin.com/in/right-deed-80924a150/',
        'twitter' => 'https://twitter.com/right_deed',
        'pinterest' => 'https://www.pinterest.com/rightdeed/pins/',
        'googleplus' => 'https://plus.google.com/116587637553760893275',
        'instagram' => 'https://www.instagram.com/right.deed/',
    ],

    /*
    | Google services. The maps key is read from GOOGLE_MAPS_API_KEY in .env so
    | the key is not hardcoded in views.
    */
    'google' => [
        'googleMap' => env('GOOGLE_MAPS_API_KEY'),
    ],
];