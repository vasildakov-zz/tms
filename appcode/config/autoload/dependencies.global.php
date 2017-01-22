<?php
#use Zend\Expressive\Application;
#use Zend\Expressive\Container\ApplicationFactory;
use Zend\Expressive\Helper;
use League\Tactician\CommandBus;

return [
    'dependencies' => [
        'invokables' => [
            Helper\ServerUrlHelper::class          => Helper\ServerUrlHelper::class,
        ],
        'factories' => [
            Zend\Expressive\Application::class     => Zend\Expressive\Container\ApplicationFactory::class,
            Helper\UrlHelper::class                => Helper\UrlHelperFactory::class,
            //Doctrine\Common\Cache\Cache::class   => App\Container\DoctrineRedisCacheFactory::class,
            //Doctrine\ORM\EntityManager::class    => App\Container\DoctrineFactory::class,
            'doctrine.entity_manager.orm_default'  => ContainerInteropDoctrine\EntityManagerFactory::class,
            //'doctrine.entity_manager.orm_saas'   => \Infrastructure\Database\Connection\Doctrine\EntityManagerFactory::class,

            // Command Bus
            League\Tactician\CommandBus::class     => Application\Container\CommandBusFactory::class,

            // Handlers
            Application\Ping\PingHandler::class    => Application\Ping\PingHandlerFactory::class,
        ],
    ],
];
