<?php

return [
    'issuer' => env('APP_URL', 'who-sent-the-token'),
    'secret' => env('JWT_SECRET', 'your-jwt-secret-key'),
    'algo' => 'HS256',
    'ttl' => 3600, // Expiration en secondes
];
