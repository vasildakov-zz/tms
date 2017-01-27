<?php

namespace InfrastructureTest\Database\Connection\Zend;

use Interop\Container\ContainerInterface;
use Zend\Db\Adapter\Adapter;

class AdapterTest extends \PHPUnit_Framework_TestCase
{

    protected function setUp()
    {

    }

    public function testAbc() {
        $adapter = new \Zend\Db\Adapter\Adapter([
            'driver'   => 'Pdo_Mysql',
            'hostname' => 'mysql',
            'database' => 'tms',
            'username' => 'root',
            'password' => '1',
        ]);

        // $stmt = $adapter->query('SELECT * FROM `payment`');
        $stmt   = $adapter->query('SHOW DATABASES');
        $result = $stmt->execute();

        var_dump(
            $result->getResource()->fetchAll()
        );
    }
}
