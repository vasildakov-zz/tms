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

            // Default Doctrine Entity Manager
            'doctrine.entity_manager.orm_default' => ContainerInteropDoctrine\EntityManagerFactory::class,

            // Dynamic Doctrine Entity Manager
            'doctrine.entity_manager.orm_secondary' => \Infrastructure\Database\Connection\Doctrine\EntityManagerFactory::class,

            // Command Bus
            League\Tactician\CommandBus::class     => Application\Container\CommandBusFactory::class,

            // Handlers
            Application\Ping\PingHandler::class    => Application\Ping\PingHandlerFactory::class,
            Application\Session\CreateSession::class    => Application\Session\CreateSessionFactory::class,

            // Doctrine ORM Tools
            \Doctrine\ORM\Tools\SchemaValidator::class => \Infrastructure\Doctrine\Tools\SchemaValidatorFactory::class,
            \Doctrine\ORM\Tools\SchemaTool::class => \Infrastructure\Doctrine\Tools\SchemaToolFactory::class,

            // Doctrine Data Fixtures
            \Doctrine\Common\DataFixtures\Executor\ORMExecutor::class => \Infrastructure\Doctrine\Tools\ExecutorFactory::class,
            \Doctrine\Common\DataFixtures\Loader::class => \Infrastructure\Doctrine\Tools\LoaderFactory::class,
            \Doctrine\Common\DataFixtures\Purger\ORMPurger::class => \Infrastructure\Doctrine\Tools\PurgerFactory::class,

            //Doctrine\Common\Cache\Cache::class   => App\Container\DoctrineRedisCacheFactory::class,
            //Doctrine\ORM\EntityManager::class    => App\Container\DoctrineFactory::class,

            \Doctrine\DBAL\Driver\Connection::class => \Infrastructure\Database\Connection\DBAL\ConnectionFactory::class,

            // Loggers
            \Monolog\Logger::class  => \Infrastructure\Logger\Monolog\LoggerFactory::class,
            \Zend\Log\Logger::class => \Infrastructure\Logger\Zend\LoggerFactory::class,
            \Infrastructure\Session\SessionInterface::class => \Infrastructure\Session\Zend\SessionFactory::class,
        ],
    ],
];
