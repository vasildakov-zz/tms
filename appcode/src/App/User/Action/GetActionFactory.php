<?php

namespace App\User\Action;

use Interop\Container\ContainerInterface;
use Zend\Expressive\Router\RouterInterface;

class GetActionFactory
{
    public function __invoke(ContainerInterface $container)
    {
        $em = $container->get('Doctrine\ORM\EntityManager');

        return new GetAction($em);
    }
}
