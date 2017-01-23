<?php declare(strict_types = 1);

namespace Application\Ping;

use Interop\Container\ContainerInterface;

/**
 * Class PingHandlerFactory
 *
 * @author Vasil Dakov <vasildakov@gmail.com>
 */
class PingHandlerFactory
{
    /**
     * @param  ContainerInterface $container
     * @return Ping
     */
    public function __invoke(ContainerInterface $container)
    {
        //$logger = $container->get(\Zend\Log\Logger::class);
        //return new Ping($logger);
        
        $em = $container->get('doctrine.entity_manager.orm_default');
        
        return new PingHandler($em);
    }
}
