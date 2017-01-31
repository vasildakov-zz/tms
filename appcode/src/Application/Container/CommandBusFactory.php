<?php
/**
 * This file is part of the vasildakov/tms project.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 * @copyright Copyright (c) Vasil Dakov <vasildakov@gmail.com>
 * @link https://github.com/vasildakov/tms GitHub
 */

namespace Application\Container;

use Interop\Container\ContainerInterface;

use League\Tactician\CommandBus;
use League\Tactician\Handler\CommandHandlerMiddleware;
use League\Tactician\Container\ContainerLocator;
use League\Tactician\Handler\CommandNameExtractor\ClassNameExtractor;
use League\Tactician\Handler\MethodNameInflector\InvokeInflector;

use Application\Ping\PingCommand;
use Application\Ping\PingHandler;

use Application\Session\CreateSessionCommand;
use Application\Session\CreateSession;

class CommandBusFactory
{
    /**
     * @param  ContainerInterface $container
     * @return CommandBus
     */
    public function __invoke(ContainerInterface $container)
    {
        $inflector = new InvokeInflector();

        /**
         * @todo Move command mapping in configuration file
         * @example  $container->get('config')['commands']
         */
        $commandsMapping = [
            PingCommand::class => PingHandler::class,
            CreateSessionCommand::class => CreateSession::class,
        ];

        $locator = new ContainerLocator($container, $commandsMapping);

        $nameExtractor = new ClassNameExtractor();

        $commandHandlerMiddleware = new CommandHandlerMiddleware(
            $nameExtractor,
            $locator,
            $inflector
        );

        $commandBus = new CommandBus([
            $commandHandlerMiddleware
        ]);

        return $commandBus;
    }
}
