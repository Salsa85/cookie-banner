<?php

return [
    /*
    |--------------------------------------------------------------------------
    | Cookie Banner Configuration
    |--------------------------------------------------------------------------
    |
    | Here you can configure the cookie banner settings.
    |
    */

    'privacy_policy_url' => env('COOKIE_BANNER_PRIVACY_URL', '/privacy-policy'),
    
    'messages' => [
        'banner_text' => 'Wij gebruiken cookies om uw ervaring op onze website te verbeteren. Door op \'Accepteren\' te klikken gaat u akkoord met het gebruik van alle cookies.',
        'essential_button' => 'Alleen noodzakelijk',
        'accept_button' => 'Accepteren',
        'more_info' => 'Meer informatie',
    ],
]; 