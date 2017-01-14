<?php

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
