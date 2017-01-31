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

use Psr\Log\LoggerInterface;
use Infrastructure\Session\SessionInterface;

/**
 * Class CreateSession
 *
 * @author Vasil Dakov <vasildakov@gmail.com>
 */
final class CreateSession implements CreateSessionInterface
{
    /**
     * @var LoggerInterface
     */
    private $logger;

    /**
     * @var SessionInterface
     */
    private $session;

    /**
     * @var RepositoryInterface
     */
    private $repository;


    /**
     * Constructor
     *
     * @param LoggerInterface       $logger
     * @param SessionInterface      $session
     * @param RepositoryInterface   $repository
     */
    public function __construct(LoggerInterface $logger, SessionInterface $session)
    {
        $this->logger  = $logger;
        $this->session = $session;
    }

    /**
     * @param  CreateSessionCommand $command
     * @return void
     */
    public function __invoke(CreateSessionCommand $command): void
    {
        $this->session->unset('client');
        // 1) get the subdomain: $command->subdomain();

        // 2) check if the client is exist: $repository->findOneBy($command->subdomain());

        // 3) check if the session is exist: $session->has('key');
        if (!$this->session->has('client')) {
             $this->session->set('client', $command->subdomain());

            $this->logger->info('new session has been created');
        }

        $this->logger->info('the session exists');

        // var_dump($this->session->get('client')); exit();
    }
}
