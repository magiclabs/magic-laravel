<?php

return [
    /*
     |--------------------------------------------------------------------------
     | Secret API Key
     |--------------------------------------------------------------------------
     |
     | Your API secret key retrieved from https://dashboard.magic.link
     |
     */

    'secret_api_key' => env('MAGIC_SECRET_API_KEY', null),

    /*
     |--------------------------------------------------------------------------
     | HTTP request strategy
     |--------------------------------------------------------------------------
     |
     | Customize your HTTP request strategy when making calls to the Magic API
     |
     */

    'http' => [
        'retries' => 3, // Total number of retries to allow

        'timeout' => 10, // A period of time the request is going to wait for a response

        'backoff_factor' => 0.02, // A backoff factor to apply between retry attempts
    ],
];
