<?php

return [
    'doctrine' => [
        'connection' => [
            'orm_default' => [
                'driver_class' => \Doctrine\DBAL\Driver\PDOMySql\Driver::class,
            ],
        ],
        'driver' => [
            'orm_default' => [
                'class' => \Doctrine\Common\Persistence\Mapping\Driver\MappingDriverChain::class,
                'drivers' => [
                    'Domain\Entity' => __NAMESPACE__,
                ],
            ],
            __NAMESPACE__ => [
                'class' => \Doctrine\ORM\Mapping\Driver\XmlDriver::class,
                'cache' => 'array',
                'paths' => __DIR__ . '/../../src/Infrastructure/Doctrine/Mapping',
            ],
        ],
    ],
];
