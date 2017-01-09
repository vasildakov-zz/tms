<?php

namespace App\User\Action;

use Interop\Container\ContainerInterface;
use Doctrine\ORM\EntityManager;

use Zend\Diactoros\Response\JsonResponse;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\RequestInterface;

class GetListAction
{
	/**
	 * @var ContainerInterface $container
	 */
	private $container;

	/**
	 * @var EntityManager $container
	 */
	private $em;


	/**
	 * @param ContainerInterface $container
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

    	$data = [];
    	for ($i = 1; $i < 11; $i++) {
			$data[] = [
                'id'      => $i, 
                'email'   => $faker->email,
                'name'    => $faker->firstName,
                'surname' => $faker->lastName,
                'address' => $faker->address,
                'postcode'=> $faker->postcode
            ];
		}

        return new JsonResponse([
        	'users' => $data
        ]);
    }
}
