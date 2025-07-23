<?php

return [
    'secret' => env('CLIENTXCMS_SSO_SECRET'),
    'token' => [
        'length' => 48,
        'lifetime' => 60
    ],
];
