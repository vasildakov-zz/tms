<?php

namespace InfrastructureTest\Database\Connection\DBAL;

use Interop\Container\ContainerInterface;
use Infrastructure\Database\Connection\DBAL\ConnectionFactory;
use Doctrine\DBAL\Driver\Connection;

class CustomerTest extends \PHPUnit_Framework_TestCase
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
    public function itCanBeConstructed()
    {
        $factory = new ConnectionFactory();

        self::assertInstanceOf(ConnectionFactory::class, $factory);
    }

    /**
     * @test
     * @group infrastructure
     */
    public function itReturnsConnectionInstance()
    {
        $config = $this->getConfig();

        $this->container
             ->expects($this->once())
             ->method('has')
             ->with('config')
             ->willReturn(true)
        ;

        $this->container
             ->expects($this->once())
             ->method('get')
             ->with('config')
             ->willReturn($config)
        ;

        $factory = new ConnectionFactory();

        self::assertInstanceOf(Connection::class, ($factory)($this->container));
    }


    /**
     * @test
     * @group infrastructure
     * @expectedException InvalidArgumentException
     * @expectedExceptionMessage Missing configuration service
     */
    public function itThrowsConfigurationException()
    {
        $config = $this->getConfig();

        $this->container
             ->expects($this->once())
             ->method('has')
             ->with('config')
             ->willReturn(false)
        ;

        $factory = new ConnectionFactory();
        self::assertInstanceOf(Connection::class, ($factory)($this->container));
    }



    private function getConfig()
    {
        return [
            'db' => [
                'driver'   => 'pdo_mysql',
                'host'     => 'mysql',
                'port'     => '3306',
                'dbname'   => 'database',
                'user'     => 'user',
                'password' => 'password',
                'charset'  => 'UTF8',
            ]
        ];
    }
}
