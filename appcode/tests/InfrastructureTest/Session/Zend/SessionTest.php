<?php
namespace InfrastructureTest\Session\Zend;

use Infrastructure\Session\SessionInterface;
use Infrastructure\Session\Zend\Session;

class SessionTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @test
     * @group infrastructure
     */
    public function itCanBeConstructed()
    {
        $session = new Session();

        self::assertInstanceOf(SessionInterface::class, $session);
    }
}
