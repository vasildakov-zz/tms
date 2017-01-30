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

namespace Application\Session;

/**
 * CreateSession
 *
 * Create session
 */
final class CreateSession implements CreateSessionInterface
{
    /**
     * @param Zend\Session\Container $session
     * @param ClientRepository       $repository
     */
    public function __construct($session, $repository)
    {
        $this->session = $session;
        $this->repository = $repository;
    }


    /**
     * @param  CreateSessionCommand $command
     * @return boolean
     */
    public function __invoke(CreateSessionCommand $command): bool
    {
        // 1) get the subdomain: $command->subdomain();

        // 2) check if the client is exist: $repository->findOneBy();

        // 3) check if the session is exist: $container->offsetGet('key');

        // 4) create a session if does not exist: $container->offsetSet('key', 'value');
    }
}
