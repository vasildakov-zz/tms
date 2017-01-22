<?php // config/autoload/doctrine.local.php

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
