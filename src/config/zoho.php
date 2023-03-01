<?php

return [

    'api' => [
        "url_authorize" => env('ZOHO_URL_AUTHORIZE', 'https://accounts.zoho.eu/oauth/v2/token'),
        "client_id" => env('ZOHO_CLIENT_ID'),
        "client_secret" => env('ZOHO_CLIENT_SECRET'),
        "refresh_token" => env('ZOHO_REFRESH_TOKEN'),
        "url" => env('ZOHO_RECORD_URL'),
    ],

];
