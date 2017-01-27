<?php

namespace DomainTest\Entity;

use Domain\Entity\Payment;

class PaymentTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @test
     * @group domain
     */
    public function itCanBeConstructed()
    {
        $payment = new Payment('id');

        self::assertInstanceOf(Payment::class, $payment);
    }
}
