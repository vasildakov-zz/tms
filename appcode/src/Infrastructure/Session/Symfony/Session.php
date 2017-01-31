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

namespace Infrastructure\Session\Symfony;

use Symfony\Component\HttpFoundation;
use Infrastructure\Session\SessionInterface;

/**
 * Class Session
 *
 * An adapter for \Zend\Session\Container
 *
 * @author Vasil Dakov <vasildakov@gmail.com>
 */
class Session extends HttpFoundation\Session\Session implements SessionInterface
{
    /**
     * {@inheritDoc}
     */
    public function has($key)
    {
        return self::has($key);
    }

    /**
     * {@inheritDoc}
     */
    public function get($key)
    {
        return self::get($key);
    }

    /**
     * {@inheritDoc}
     */
    public function set($key, $value)
    {
        return self::set($key, $value);
    }

    /**
     * {@inheritDoc}
     */
    public function remove($key)
    {
        return self::remove($key);
    }
}
