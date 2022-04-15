<?php

   // $baseUrl = 'http://localhost/skoll-backend';
   // $host = 'localhost/skoll-backend';

    // $baseUrl = 'http://34.142.54.43';
    // $host = '34.142.54.43';

    $baseUrl = 'http://127.0.0.1:8000';
    $host = 'localhost';

    return array_merge([
        'apiVersion' => '1.0.0',
        'swaggerVersion' => '3.2.0',
        'host' => $host,
        'basePath' => '/api',
        'baseUrl' => $baseUrl
    ]);
