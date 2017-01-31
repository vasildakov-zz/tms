<?php
namespace InfrastructureTest\Session\Zend;

use Infrastructure\Session\Zend\SessionManager;

class SessionManagerTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @test
     * @group infrastructure
     */
    public function itCanBeConstructed()
    {
        $session = new SessionManager();

        self::assertInstanceOf(SessionManager::class, $session);
    }
}
