<?php

return [
    'dependencies' => [
        'invokables' => [
            Zend\Expressive\Router\RouterInterface::class => Zend\Expressive\Router\ZendRouter::class,
            Application\Action\PingAction::class => Application\Action\PingAction::class,

            Presentation\Ui\Dashboard\Dashboard::class => Presentation\Ui\Dashboard\Dashboard::class,
        ],
        'factories' => [
            Application\Action\HomePageAction::class => Application\Action\HomePageFactory::class,
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
            'middleware' => Application\Action\PingAction::class,
            'allowed_methods' => ['GET'],
        ],
        [
            'name' => 'ui.dashboard',
            'path' => '/dashboard',
            'middleware' => Presentation\Ui\Dashboard\Dashboard::class,
            'allowed_methods' => ['GET'],
        ],
    ],
];
