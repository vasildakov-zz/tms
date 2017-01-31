<?php
namespace Infrastructure\Session;

/**
 * Interface SessionInterface
 */
interface SessionInterface
{
    /**
     * Determine if the key exists
     *
     * @param  string $key
     * @return bool
     */
    public function has($key);

    /**
     * Retrieve a specific key in the container
     *
     * @param  string $key
     * @return mixed
     */
    public function get($key);

    /**
     * Store a value within the container
     *
     * @param  string $key
     * @param  mixed  $value
     * @return void
     */
    public function set($key, $value);

    /**
     * Unset a single key in the container
     *
     * @param  string $key
     * @return void
     */
    public function remove($key);
}
