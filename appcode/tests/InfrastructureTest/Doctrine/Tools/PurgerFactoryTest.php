<?php
namespace InfrastructureTest\Doctrine\Tools;

use Doctrine\Common\DataFixtures\Purger\ORMPurger;
use Interop\Container\ContainerInterface;
use Infrastructure\Doctrine\Tools\PurgerFactory;

class PurgerFactoryTest extends \PHPUnit_Framework_TestCase
{
    private $container;

    protected function setUp()
    {
        /** @var \PHPUnit_Framework_MockObject_MockObject|ContainerInterface $container */
        $this->container = $this->getMockForAbstractClass(ContainerInterface::class);
    }

    /**
     * @test
     * @group infrastructure
     */
    public function itReturnsPurgerInstance()
    {
        $factory = new PurgerFactory();

        self::assertInstanceOf(ORMPurger::class, $factory($this->container));
    }
}
