<?php declare(strict_types = 1);

namespace Presentation\Ui\Action;

use Interop\Container\ContainerInterface;
use Interop\Container\Exception;
use League\Tactician\CommandBus;

/**
 * Class LoginFactory
 *
 * @author Vasil Dakov <vasildakov@gmail.com>
 */
class LoginFactory
{
    /**
     * @param ContainerInterface $container
     * @return Dashboard
     */
    public function __invoke(ContainerInterface $container)
    {
        if (!$container->has(CommandBus::class)) {
            throw new \Exception("CommandBus is not configured");
        }

        $bus = $container->get(CommandBus::class);

        return new Login($bus);
    }
}