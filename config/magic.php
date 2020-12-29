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
        'retries' => env('MAGIC_RETRIES', 3), // Total number of retries to allow

        'timeout' => env('MAGIC_TIMEOUT', 10), // A period of time the request is going to wait for a response

        'backoff_factor' => env('MAGIC_BACKOFF_FACTOR', 0.02), // A backoff factor to apply between retry attempts
    ],
];
