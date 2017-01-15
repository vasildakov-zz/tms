<?php
/**
 * This file is part of the vasildakov/tms project.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 * @copyright Copyright (c) Vasil Dakov <vasildakov@gmail.com>
 * @link https://github.com/vasildakov/tms GitHub
 */

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
