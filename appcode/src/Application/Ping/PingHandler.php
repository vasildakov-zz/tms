<?php
declare(strict_types = 1);

namespace Application\Ping;

use Psr\Log\LoggerInterface;

/**
 * Class Ping Service
 *
 * @author Vasil Dakov <vasildakov@gmail.com>
 */
final class PingHandler
{
    /**
     * @var LoggerInterface
     */
    private $logger;


    /**
     * @param LoggerInterface $logger
     */
    //public function __construct(LoggerInterface $logger)
    public function __construct()
    {
        //$this->logger = $logger;
    }


    /**
     * @param  PingCommand $command
     */
    public function __invoke(PingCommand $command)
    {
        $time = $command->time();

        // $this->logger->info(sprintf('Ping time %s', $time));
        // return new PingResponse($time);
    }
}
