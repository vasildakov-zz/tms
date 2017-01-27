<?php

namespace DomainTest\Entity;

use Domain\Entity\Customer;

class CustomerTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @test
     * @group domain
     */
    public function itCanBeConstructed()
    {
        $customer = new Customer('id', 'company', 'contact@company.com');

        self::assertInstanceOf(Customer::class, $customer);
    }
}
