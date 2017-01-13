<?php // config/autoload/doctrine.local.php

// return [
//     'doctrine' => [
//         'orm'        => [
//             'auto_generate_proxy_classes' => false,
//             'proxy_dir'                   => 'data/cache/EntityProxy',
//             'proxy_namespace'             => 'EntityProxy',
//             'underscore_naming_strategy'  => true,
//         ],
//         'connection' => [
//             // default connection
//             'orm_default' => [
//                 'driver'   => 'pdo_mysql',
//                 'host'     => '127.0.0.1',
//                 'port'     => '3306',
//                 'dbname'   => 'expressive',
//                 'user'     => 'root',
//                 'password' => '1',
//                 'charset'  => 'UTF8',
//             ],
//         ],
//         'cache'      => [
//             'redis' => [
//                 'host' => '127.0.0.1',
//                 'port' => '6379',
//             ],
//         ],
//     ],
// ];


// return [
//     'doctrine' => [
//         'connection' => [
//             'orm_default' => [
//                 'driver_class' => \Doctrine\DBAL\Driver\PDOMySql\Driver::class,
//                 'params' => [
//                     'url' => 'mysql://root:1@127.0.0.1/tms',
//                 ],
//             ],
//         ],
//         'driver' => [
//             'orm_default' => [
//                 'class' => \Doctrine\Common\Persistence\Mapping\Driver\MappingDriverChain::class,
//                 'drivers' => [
//                     'Domain\Entity' => 'my_entity',
//                 ],
//             ],
//             'my_entity' => [
//                 'class' => \Doctrine\ORM\Mapping\Driver\XmlDriver::class,
//                 'cache' => 'array',
//                 'paths' => __DIR__ . '/../../src/Infrastructure/Doctrine/Mapping',
//             ],
//         ],
//     ],
// ];


return [
    'doctrine' => [
        'connection' => [
            'orm_default' => [
                'driverClass' => \Doctrine\DBAL\Driver\PDOMySql\Driver::class,
                'params' => [
                    'driver'   => 'pdo_mysql',
                    'host'     => 'mysql',
                    'port'     => '3306',
                    'dbname'   => 'tms',
                    'user'     => 'root',
                    'password' => '1',
                    'charset'  => 'UTF8',
                ],
            ],
        ],
    ],
];