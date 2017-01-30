<?php declare(strict_types = 1);

namespace Application\Session;

class CreateSessionCommand
{
    private $subdomain;

    public function __construct($subdomain)
    {
        $this->subdomain = $subdomain;
    }

    public function subdomain()
    {
        return $this->subdomain;
    }
}
