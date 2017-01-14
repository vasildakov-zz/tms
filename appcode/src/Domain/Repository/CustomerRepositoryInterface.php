<?php

namespace Domain\Repository;

use Domain\Entity\Customer;

interface CustomerRepositoryInterface
{
    /**
     * @param  string $username
     * @return Customer
     */
    public function findOneByUsername(string $username);

    public function findOneByApiKey(string $key);
}
