<?php

return [
    'mode'    => 'sandbox', 
    'sandbox' => [
        'username'    => env('PAYPAL_SANDBOX_API_USERNAME', 'sb-2caj55067767@business.example.com'),
        'password'    => env('PAYPAL_SANDBOX_API_PASSWORD', "2V2QX7MDR8M83G5P"),
        'secret'      => env('PAYPAL_SANDBOX_API_SECRET', 'AmYuNATHV.hu72VXowUSN6qDGwcaAcgRWleqVWi6Hq222OqVCNTpanjX'),
        'certificate' => env('PAYPAL_SANDBOX_API_CERTIFICATE', ''),
        'app_id'      => 'APP-80W284485P519543T',
    ],
    'payment_action' => 'Sale', 
    'currency'       => 'GBP',
    'notify_url'     => 'dev.lotsofpots.co.uk/checkout/confirmation/{id}', // Change this accordingly for your application.
    'locale'         => 'en_GB', // force gateway language  i.e. it_IT, es_ES, en_US ... (for express checkout only)
    'validate_ssl'   => true, // Validate SSL when creating api client.
];