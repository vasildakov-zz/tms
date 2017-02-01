<?php
namespace InfrastructureTest\Doctrine\Tools;

use Doctrine\Common\DataFixtures\Loader;
use Infrastructure\Doctrine\Tools\LoaderFactory;
use Interop\Container\ContainerInterface;

class LoaderFactoryTest extends \PHPUnit_Framework_TestCase
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
    public function itReturnsLoaderInstance()
    {
        $factory = new LoaderFactory();

        self::assertInstanceOf(Loader::class, $factory($this->container));
    }
}
