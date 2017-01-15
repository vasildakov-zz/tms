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

namespace Domain\Entity;

class Customer
{
    private $username;

    private $email;

    public function __construct($username, $email)
    {
        $this->setUsername($username);

        $this->setEmail($email);
    }

    private function setUsername($username)
    {
        $this->username = $username;

        return $this;
    }

    private function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }
}
