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
    private $id;

    private $username;

    private $email;

    private $createdAt;

    public function __construct($id, $username, $email)
    {
        $this->setId($id);
        $this->setUsername($username);
        $this->setEmail($email);
        $this->setCreatedAt(new \DateTimeImmutable('now'));
    }

    private function setId($id)
    {
        $this->id = $id;

        return $this;
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

    private function setCreatedAt(\DateTimeImmutable $datetime)
    {
        $this->datetime = $datetime;

        return $this;
    }
}
