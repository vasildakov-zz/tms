<?php declare(strict_types = 1);

namespace Application\Schema;

/**
 * CreateSchemaCommand
 */
final class CreateSchemaCommand
{
    /**
     * @var string $driver
     */
    private $driver;

    /**
     * @var string $user
     */
    private $user;

    /**
     * @var string $password
     */
    private $password;

    /**
     * @var string $database
     */
    private $database;

    /**
     * Constructor
     *
     * @param string $driver
     * @param string $user
     * @param string $password
     * @param string $database
     */
    public function __construct(string $driver, string $user, string $password, string $database)
    {
        $this->driver   = $driver;
        $this->user     = $user;
        $this->password = $password;
        $this->database = $database;
    }

    /**
     * @return string
     */
    public function driver() : string {
        return $this->driver;
    }

    /**
     * @return string
     */
    public function user() : string {
        return $this->user;
    }

    /**
     * @return string
     */
    public function password() : string {
        return $this->password;
    }

    /**
     * @return string
     */
    public function database() : string {
        return $this->database;
    }
}
