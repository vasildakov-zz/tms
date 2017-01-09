<?php

namespace App\User\Action;

use Interop\Container\ContainerInterface;
use Doctrine\ORM\EntityManager;

use Zend\Diactoros\Response\JsonResponse;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\RequestInterface;

class GetAction
{
    /**
     * @var EntityManager $em
     */
    private $em;

    /**
     * @param EntityManager $em
     */
    public function __construct(EntityManager $em)
    {
        $this->em   = $em;
    }

    /**
     * @param  RequestInterface  $request
     * @param  ResponseInterface $response
     * @param  callable|null     $next
     * @return JsonResponse
     */
    public function __invoke(RequestInterface $request, ResponseInterface $response, callable $next = null)
    {
        $faker = \Faker\Factory::create();

        $id = $request->getAttribute('id');

        return new JsonResponse([
            'user' => [
                'id'      => $id,
                'email'   => $faker->email,
                'name'    => $faker->firstName,
                'surname' => $faker->lastName,
                'address' => $faker->address,
                'postcode'=> $faker->postcode
            ]
        ]);
    }
}
