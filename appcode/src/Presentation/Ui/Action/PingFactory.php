<?php declare(strict_types = 1);

namespace Presentation\Ui\Action;

use Interop\Container\ContainerInterface;
use League\Tactician\CommandBus;

/**
 * Class PingFactory
 *
 * @author Vasil Dakov <vasildakov@gmail.com>
 */
class PingFactory
{
    /**
     * @param  ContainerInterface $container
     * @return Ping
     */
    public function __invoke(ContainerInterface $container)
    {
        if (!$container->has(CommandBus::class)) {
            throw new \Exception("CommandBus is not configured");
        }

        $bus = $container->get(CommandBus::class);

        return new Ping($bus);
    }
}
