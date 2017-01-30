<?php

return [
    'debug' => true,

    'config_cache_enabled' => true,

    'databases' => [
        'idc'  => [
            'host'     => 'mysql',
            'port'     => '3306',
            'dbname'   => 'idc',
            'user'     => 'idc',
            'password' => '123456',
            'charset'  => 'UTF8',
        ],
        'acme' => [
            'host'     => 'mysql',
            'port'     => '3306',
            'dbname'   => 'acme',
            'user'     => 'acme',
            'password' => '123456',
            'charset'  => 'UTF8',
        ],
    ]
];
