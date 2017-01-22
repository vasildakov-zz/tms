<?php

return [
    'dependencies' => [
        'invokables' => [
            Zend\Expressive\Router\RouterInterface::class => Zend\Expressive\Router\ZendRouter::class,
        ],
        'factories' => [
            Application\Action\HomePageAction::class => Application\Action\HomePageFactory::class,
            Presentation\Ui\Action\Ping::class       => Presentation\Ui\Action\PingFactory::class,
            Presentation\Ui\Action\Dashboard::class  => Presentation\Ui\Action\DashboardFactory::class,
        ],
    ],

    'routes' => [
        [
            'name' => 'home',
            'path' => '/',
            'middleware' => Application\Action\HomePageAction::class,
            'allowed_methods' => ['GET'],
        ],
        [
            'name' => 'api.ping',
            'path' => '/api/ping',
            'middleware' => Presentation\Ui\Action\Ping::class,
            'allowed_methods' => ['GET'],
        ],
        [
            'name' => 'ui.dashboard',
            'path' => '/dashboard',
            'middleware' => Presentation\Ui\Action\Dashboard::class,
            'allowed_methods' => ['GET'],
        ],
    ],
];
