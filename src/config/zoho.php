<?php

return [

    'api' => [
        "url_authorize" => env('ZOHO_URL_AUTHORIZE', 'https://accounts.zoho.eu/oauth/v2/token'),
        "client_id" => env('ZOHO_CLIENT_ID'),
        "client_secret" => env('ZOHO_CLIENT_SECRET'),
        "refresh_token" => env('ZOHO_REFRESH_TOKEN'),
        "url" => env('ZOHO_RECORD_URL'),
    ],

    'pixell_ips' => [
        'srv6' => [
            '149.202.149.175',
            '51.91.106.138'
        ],
        'srv5' => [
            '37.187.156.173',
            '87.98.174.100',
            '87.98.180.87',
            '87.98.183.35',
            '87.98.184.91',
        ],
        'srv4' => [
            '54.37.82.150',
            '217.182.35.28',
            '217.182.35.29',
            '217.182.35.30',
            '217.182.35.31',
            '141.94.89.57',
        ],
        'srv2' => [
            '91.121.83.162',
            '188.165.32.220',
            '188.165.32.236',
            '188.165.45.102',
            '37.59.241.161',
            '37.59.241.166',
            '87.98.135.139',
        ]
    ]

];
