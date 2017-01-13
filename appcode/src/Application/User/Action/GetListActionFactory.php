<?php

namespace App\User\Action;

use Interop\Container\ContainerInterface;
use Zend\Expressive\Router\RouterInterface;

class GetListActionFactory
{
    public function __invoke(ContainerInterface $container)
    {
        $em = $container->get('Doctrine\ORM\EntityManager');

        return new GetListAction($em);
    }
}
