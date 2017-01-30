<?php declare(strict_types = 1);
/**
 * This file is part of the vasildakov/tms project.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 * @copyright Copyright (c) Vasil Dakov <vasildakov@gmail.com>
 * @link https://github.com/vasildakov/tms GitHub
 */

namespace Presentation\Ui;

use Presentation\Ui;

/**
 * Class ModuleConfig
 *
 * @author Vasil Dakov <vasildakov@gmail.com>
 */
class ModuleConfig
{
    public function __invoke()
    {
        return [
            'dependencies' => [
                'invokables' => [
                    
                ],
                'factories' => [
                    Ui\Middleware\Session::class => Ui\Middleware\SessionFactory::class,

                    Ui\Action\Home::class       => Ui\Action\HomeFactory::class,
                    Ui\Action\Ping::class       => Ui\Action\PingFactory::class,
                    Ui\Action\Dashboard::class  => Ui\Action\DashboardFactory::class,
                ],
            ],
            'routes' => [
                [
                    'name' => 'ui.home',
                    'path' => '/',
                    'middleware' => Ui\Action\Home::class,
                    'allowed_methods' => ['GET'],
                ],
                [
                    'name' => 'ui.ping',
                    'path' => '/ping',
                    'middleware' =>  Ui\Action\Ping::class,
                    'allowed_methods' => ['GET'],
                ],
                [
                    'name' => 'ui.dashboard',
                    'path' => '/dashboard',
                    'middleware' =>  Ui\Action\Dashboard::class,
                    'allowed_methods' => ['GET'],
                ],
            ],
            'middleware_pipeline' => [
                'before' => [
                    'middleware' => [
                        Ui\Middleware\Session::class,
                    ],
                    'priority' => 1,
                ],
            ]
        ];
    }
}
